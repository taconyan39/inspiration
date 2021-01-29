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
use App\Category;

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
        // 各リストを新規準順に取得
        $user = Auth::user();
        $postIdeas = $user
                    ->ideas()
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
        // dd($interestIdeas);
        foreach($interestIdeas as $interestIdea){
            $interestIdea->rating = sprintf('%.1f',$interestIdea->reviews->avg('rating'));
            $interestIdea->countReview = $interestIdea->reviews->count();
        }

        $buyIdeas = $user
                    ->buyIdeas()
                    ->orderBy('created_at','desc')
                    ->take(5)
                    ->get();
        foreach($buyIdeas as $buyIdea){
            $buyIdea->rating = sprintf('%.1f',$buyIdea->reviews->avg('rating'));
            $buyIdea->countReview = $buyIdea->reviews->count();
        }

        // 自分のアイデアに投稿されたレビューとその情報を取得
        $ideaReviews = Review::leftjoin('ideas', 'reviews.idea_id', '=', 'ideas.id')
                    ->leftjoin('users','reviews.user_id', '=', 'users.id')
                    ->leftjoin('categories','ideas.category_id', '=', 'categories.id')
                    ->where('ideas.user_id','=', $user->id)
                    ->select('reviews.id','reviews.review','reviews.rating','reviews.created_at','reviews.updated_at','ideas.title','ideas.price','ideas.summary','users.name','users.icon_img','categories.category_name',)
                    ->orderBy('reviews.created_at', 'desc')
                    ->take(5)
                    ->get();

        // dd($ideaReviews[0]);

        // レビューの平均値と口コミ数を$ideasに入れる
        // $ideas = Idea::all();

        // foreach($ideas as $idea){
        //     $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
        //     $idea->countReview = $idea->reviews->count();
        // }

        return view('mypage',['user' => $user, 'postIdeas' => $postIdeas, 'interestIdeas' => $interestIdeas, 'buyIdeas' => $buyIdeas, 'ideaReviews' => $ideaReviews]);
    }
}
