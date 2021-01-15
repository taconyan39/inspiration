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
        // 日付順に並べる
        $user = Auth::user();
        $postIdeas = $user->ideas()->orderBy('created_at', 'desc')->take(5)->get();
        $ideas = Idea::all();

        // testでチェック中
        // dd($ideas[0]->reviews()->where('user_id', 1)->avg('rating'));
        
        $reviews = $user->reviews;
        // $interests = $user->interests;
        // $buyIdeas = BuyIdea::all()->ideas($user->id);
        
        return view('home',['user' => $user, 'postIdeas' => $postIdeas,'reviews' => $reviews, 'ideas' => $ideas]);
    }
}
