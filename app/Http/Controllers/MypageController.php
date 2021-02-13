<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Idea;
use App\Review;


class MypageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();
            $user_img = $user->icon_img;
        }else{
            $user = false;
            $user_img = 'noimage_icon.png';
        }
        $user_id = $user->id;

        $postIdeas = Idea::where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();

        // 平均点と口コミ数を代入
        foreach($postIdeas as $postIdea){
            $postIdea->rating = sprintf('%.1f',$postIdea->reviews->avg('rating'));
            $postIdea->countReview = $postIdea->reviews->count();
        }

        $interestIdeas = $user
                    ->interestIdeas()
                    ->orderBy('created_at','desc')
                    ->take(5)
                    ->get();

        foreach($interestIdeas as $interestIdea){
            $interestIdea->rating = sprintf('%.1f',$interestIdea->reviews->avg('rating'));
            $interestIdea->countReview = $interestIdea->reviews->count();
        }
                    

        $ideaReviews = Review::whereHas('idea', function($q) use ($user_id){
            $q->where('user_id', $user_id);
        })->take(5)->get();

        return view('mypage',['user' => $user, 'postIdeas' => $postIdeas, 'interestIdeas' => $interestIdeas, 'ideaReviews' => $ideaReviews, 'user_img' => $user_img]);
    }

}
