<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Review;
use App\Idea;
use App\Mail\ArrivedReview;

class ReviewsController extends Controller
{

    // レビュー投稿ページの表示
    public function index(){
        $reviews = Review::orderBy('created_at', 'desc')->paginate(10);


        return view('ideas-list.all-reviews-list',['reviews' => $reviews]);

    }
    // レビュー投稿ページの表示
    public function create($id){

        $user = Auth::user();
        $idea = Idea::find($id);
        $contributor_flg = Idea::where('id',$id)->where('user_id', $user->id);

        $review_flg = Review::where('idea_id',$id)->where('user_id', $user->id);

        // レビューを投稿済みの場合には戻る
        if($review_flg->exists()){

            return back()->with('flash_message', 'すでにレビューを投稿済みです');
        }elseif($contributor_flg->exists()){
            
            //投稿者はレビューを投稿できないようにする
            return back()->with('flash_message', '投稿者はレビューを投稿できません');
        }

        return view('reviews.post-review', ['idea' => $idea, 'user' => $user]);

    }

    public function store(Request $request, $id){

        $user = Auth::user();
        $idea = Idea::find($id);
        $contributor = Idea::where('id',$id)->where('user_id', $user->id);

        $review = Review::where('idea_id',$id)->where('user_id', $user->id);

        // レビューを投稿済みの場合には戻る
        if($review->exists()){

            return redirect('post-idea/' . $id)->with('flash_message', 'すでにレビューを投稿済みです');

        //投稿者はレビューを投稿できないようにする
        }elseif($contributor->exists()){
            
            return redirect('post-idea/' . $id)->with('flash_message', '投稿者はレビューを投稿できません');
        }

        // DBに購入情報を登録
        DB::table('reviews')->insert([
            'user_id' => $user->id,
            'idea_id' => $id,
            'review' => $request->review,
            'rating' => $request->rating,
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now()
        ]);

        Mail::to($idea->user->email)->send(new ArrivedReview());

        return redirect('post-idea/' . $id)->with('flash_message', 'レビューが投稿されました');


    }

    public function toMeReviews(){

        $user = Auth::user();
        $user_id = $user->id;
        $reviews = Review::whereHas('idea', function($q) use ($user_id){
            $q->where('user_id', $user_id);
        })->orderBy('created_at')->paginate(10);

        return view('reviews.myidea-reviews',['reviews' => $reviews]);
    }
}
