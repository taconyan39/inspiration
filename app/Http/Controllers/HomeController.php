<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Idea;
use App\Review;
use App\UserReaction; 

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
        $ideas = $user->ideas;
        $reviews = $user->reviews;
        // $favorite = $user->favorite;
        // $favorite = $user->reactions;
        
        // dd(UserReaction::find(1)->reac);

        // dd(UserReaction::find(1)->idea);

        // $reviews = [];
        // $userReviews = DB::table('reviews')->where('user_id', $user->id)->get();
        // dd($userReviews);
        // foreach($userReviews as $key => $val){

        // }
        // $reviews = Review::all();
        // dd($reviews);
        // $reviews = ;
        // 配列に入れる

        // dd(DB::table('reviews')->where('user_id', $user->id)->get());

        // foreach()
        // $reviews = DB::table('reviews')->where('idea_id', $ideas->id)->get();
        // dd($reviews);
        // $favorite = DB::table('user_reactions')->where('user_id', $user->id)->where('interest_flg', 1)->get();
        // dd($favorite[0]->ideas->summary);

        // foreach($reviews as $val){
        // }

        // dd($reviews);

        // dd($ideas[0]->reviews);
        //  dd($ideas[0]->id);
        //  foreach($ideas as $val){
            //  dd($val->reviews->);
            // $reviews = Review::find($id);

        // dd($ideas);

        // return view('mypage');
        return view('home',['user' => $user, 'ideas' => $ideas]);
    }
}
