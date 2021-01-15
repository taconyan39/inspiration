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

class HomeController extends Controller
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
        $reviews = Review::all();
        // dd($reviews);
        // 日付順に並べる
        $user = Auth::user();
        $postIdeas = $user->ideas()->orderBy('created_at', 'desc')->take(5)->get();
        $ideas = Idea::all();

        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }
        $interestIdeas = $user->interestIdeas;
        $buyIdeas = $user->buyIdeas;
        // $reviews = Review::find($postIdeas[0]->id);
        // dd($reviews);
        // $reviews = $postIdeas->reviews();
        // 無理やり配列を作ったので動かない
        // $reviews = $postIdeas->where('user_id',Review::all()->idea->user->id)
        // foreach($postIdeas as $key => $val){
        //     $reviews[$key] = $val->reviews();
        // }

        return view('home',['user' => $user, 'postIdeas' => $postIdeas, 'ideas' => $ideas, 'interestIdeas' => $interestIdeas, 'buy_ideas' => $buyIdeas]);
    }
}
