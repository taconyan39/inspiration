<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterController extends Controller
{

    // Twitter認証用の処理
    public function twitter()
    {
        $twitter = new TwitterOAuth(
            config('twitter.consumer_key'),
            config('twitter.consumer_secret')
        );
        # 認証用のrequest_tokenを取得
        # このとき認証後、遷移する画面のURLを渡す
        $token = $twitter->oauth('oauth/request_token', array(
            'oauth_callback' => config('twitter.callback_url')
        ));

        # 認証画面で認証を行うためSessionに入れる
        session(array(
            'oauth_token' => $token['oauth_token'],
            'oauth_token_secret' => $token['oauth_token_secret'],
        ));

        # 認証画面へ移動させる
        ## 毎回認証をさせたい場合： 'oauth/authorize'
        ## 再認証が不要な場合： 'oauth/authenticate'
        $url = $twitter->url('oauth/authenticate', array(
            'oauth_token' => $token['oauth_token']
        ));

        return redirect($url);
    }

    // Twitter Callback処理
    public function twitterCallback(Request $request)
    {
        $oauth_token = session('oauth_token');
        $oauth_token_secret = session('oauth_token_secret');

        # request_tokenが不正な値だった場合エラー
        if ($request->has('oauth_token') && $oauth_token !== $request->oauth_token) {
            return Redirect::to('/login');
        }

        # request_tokenからaccess_tokenを取得
        $twitter = new TwitterOAuth(
            $oauth_token,
            $oauth_token_secret
        );
        $token = $twitter->oauth('oauth/access_token', array(
            'oauth_verifier' => $request->oauth_verifier,
            'oauth_token' => $request->oauth_token,
        ));

        # access_tokenを用いればユーザー情報へアクセスできるため、それを用いてTwitterOAuthをinstance化
        $twitter_user = new TwitterOAuth(
            config('twitter.consumer_key'),
            config('twitter.consumer_secret'),
            $token['oauth_token'],
            $token['oauth_token_secret']
        );

        # 本来はアカウント有効状態を確認するためのものですが、プロフィール取得にも使用可能
        $twitter_user_info = $twitter_user->get('account/verify_credentials');
        // dd($twitter_user_info);

        return redirect('/share')->with('flash_message','シェアしました');
    }

    public function twitterLogedIn(){
        return view('twitter');
    }

    public function share(Request $request){
        // dd('twitter');
        $title = '超ド級！！';

        $id = 1;

        
        $twitter = new TwitterOAuth(config('twitter.consumer_key'), config('twitter.consumer_secret'),config('twitter.access_token'),
        config('twitter.access_token_secret'));
        
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

        return redirect('/mypage')->with('flash_message', 'シェアしました');
        }

    //     // dd($twitter->post);
    // }
}
