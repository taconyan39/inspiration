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

        // dd($requ                         est);
// 
        return redirect('/test')->with('flash_message','テストでおます');

    }

    public function axios(){
        return view('axios');
    }

    public function twitter(Request $request){
        $title = '超ド級！！';

        $id = 1;

        
        $twitter = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'),env('TWITTER_CONSUMER_TOKEN'),
        env('TWITTER_CONSUMER_ACCESS_SECRET'));
        
        // dd($twitter);
        $twitter->post("statuses/update", [
            "status" =>
                'テスト'
                // 'New Photo Post!' . PHP_EOL .
                // '新しい聖地の写真が投稿されました!' . PHP_EOL .
                // 'タイトル「' . $title . '」' . PHP_EOL .
                // '#photo #anime #photography #アニメ #聖地 #写真 #HolyPlacePhoto' . PHP_EOL .
                // 'https://www.holy-place-photo.com/photos/' . $id
        ]);
    }
}
