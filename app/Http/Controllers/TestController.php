<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Idea;
use App\Review;
use Abraham\TwitterOAuth\TwitterOAuth;

class TestController extends Controller
{
    public function get(){

        $reviews = Review::where('user_id', 1)->avg('rating');
        // $ideas = '';
        // $categories = '';
        // $users = '';
        // foreach ($reviews as $review) {
        //     echo $review->rating;
        // }
        // return view('test', ['ideas' => $ideas, 'categories' => $categories, 'users' => $users ]);
            $categories = Category::all();
            return view('./test', ['categories' => $categories ]);
        
    }
    public function post($id){

        dd($id);

        $ideas = Idea::all();
        $categories = Category::all();
        $users = User::all();
        // dd($ideas[0]->user);
        return view('test', ['ideas' => $ideas, 'categories' => $categories, 'users' => $users ]);
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
