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

     // マイページの表示
    public function index()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $user_id = $user->id;

        $postIdeas = Idea::where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();

        foreach($postIdeas as $interestIdea){
            $interestIdea->rating = sprintf('%.1f',$interestIdea->reviews->avg('rating'));
            $interestIdea->countReview = $interestIdea->reviews->count();
        }

        $buyIdeas = Idea::whereHas('buyIdeas', function($q) use ($user_id){
            $q->where('user_id', $user_id);
        })->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

        foreach($buyIdeas as $buyIdea){
            $buyIdea->rating = sprintf('%.1f',$buyIdea->reviews->avg('rating'));
            $buyIdea->countReview = $buyIdea->reviews->count();
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

        return view('mypage',['user' => $user, 'postIdeas' => $postIdeas, 'interestIdeas' => $interestIdeas, 'ideaReviews' => $ideaReviews, 'buyIdeas' => $buyIdeas]);
    }

}
