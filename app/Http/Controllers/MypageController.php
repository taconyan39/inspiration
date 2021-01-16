<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Idea;
use App\Review;
use App\UserReaction; 
use App\Interest;
use App\BuyIdea;

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
        // 各リストを新基準順に取得
        $user = Auth::user();
        $postIdeas = $user
                    ->ideas()
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();
        foreach($postIdeas as $postIdea){
            $postIdea->rating = sprintf('%.1f',$postIdea->reviews->avg('rating'));
            $postIdea->countReview = $postIdea->reviews->count();
        }

        // dd($postIdeas[0]->rating);

        $interestIdeas = $user
                    ->interestIdeas()
                    ->orderBy('created_at','desc')
                    ->take(5)
                    ->get();

        $buyIdeas = $user
                    ->buyIdeas()
                    ->orderBy('created_at','desc')
                    ->take(5)
                    ->get();

        // 自分のアイデアに投稿されたレビューを取得
        $ideaReviews = Review::join('ideas', 'reviews.idea_id', '=', 'ideas.id')
                    ->where('ideas.user_id','=', $user->id)->orderBy('reviews.created_at', 'desc')->take(5)
                    ->get();

        // dd($ideaReviews[0]);

        // レビューの平均値と口コミ数を$ideasに入れる
        // $ideas = Idea::all();

        // foreach($ideas as $idea){
        //     $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
        //     $idea->countReview = $idea->reviews->count();
        // }


        return view('mypage',['user' => $user, 'postIdeas' => $postIdeas, 'interestIdeas' => $interestIdeas, 'buy_ideas' => $buyIdeas, 'ideaReviews' => $ideaReviews]);
    }
}
