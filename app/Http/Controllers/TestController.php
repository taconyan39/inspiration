<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Idea;
use App\Review;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function get(){

        // dd('get');
        $user = User::find(1);
        $ideas = Idea::all()->where('user_id',$user->id);
        $ideaReviews = Review::join('ideas', 'reviews.idea_id', '=', 'ideas.id')->where('ideas.user_id','=', $user->id)->get();
        // dd($ideaReviews[0]->created_at);
        //  $reviews = DB::table('reviews')->where();
        //  dd($user->reviews());
        // dd($review[0]->idea->user->name);
        // $ideas = '';
        // $categories = '';
        // $users = '';
        // foreach ($reviews as $review) {
        //     echo $review->rating;
        // }
        // return view('test', ['ideas' => $ideas, 'categories' => $categories, 'users' => $users ]);
            // $categories = Category::all();
            return view('./test');
        
    }
    public function post(Request $request){

        dd('post');
        return redirect('/test')->with('flash_message','テストでおます');

    }

    public function axios(){
        return view('axios');
    }


    public function getTimeline(Request $request)
    {
        # userがある前提です
        $user = User::find(Auth::user()->user_id);

        $twitter = new TwitterOAuth(
            config('twitter.consumer_key'),
            config('twitter.consumer_secret')
        );
        # 指定したユーザーのタイムラインを取得
        $timeline = $twitter->get('statuses/user_timeline', array(
            'user_id' => Auth::User()->twitter_id,
        ));
        // dd($ret);
    }

    public function getFollowList(Request $request)
    {
        # userがある前提です
        $user = User::find(Auth::user()->user_id);

        $twitter = new TwitterOAuth(
            config('twitter.consumer_key'),
            config('twitter.consumer_secret')
        );
        # 指定したユーザーのフォローを取得
        $timeline = $twitter->get('friends/list', array(
            'user_id' => Auth::User()->twitter_id,
        ));
        // dd($ret);
    }

    public function getFollowerList(Request $request)
    {
        # userがある前提です
        $user = User::find(Auth::user()->user_id);

        $twitter = new TwitterOAuth(
            config('twitter.consumer_key'),
            config('twitter.consumer_secret')
        );
        # 指定したユーザーのフォロワーを取得
        $timeline = $twitter->get('followers/list', array(
            'user_id' => Auth::User()->twitter_id,
        ));
        // dd($ret);
    }
}
