<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Idea;
use Illuminate\Support\Facades\Mail;
use App\Mail\IdeaSoldMail;
use App\Mail\IdeaBoughtMail;

class ShowIdeaController extends Controller
{
    // 購入処理
    // public function buy(Request $request ,$id){

    //     return view('post-idea.purchase-process')->action('PostIdeasController@buyProcess',[ 'request' => $request, 'id' => $id]);
    // }
    public function buy(Request $request ,$id){
        if(!Auth::check()){
            return view('/')->with('flash_message','ログインが必要です');
        }

        $user = Auth::user();
        $idea = Idea::find($id);
        $contributor = DB::table('ideas')->where('id', $id)->where('user_id', $user->id)->exists();
        $buy_flg = DB::table('buy_ideas')->where('idea_id', $id)->where('user_id',$user->id)->exists();

        // すでに購入済みでないかの確認
        if($buy_flg){
            return redirect('post-idea/' . $id)->with('flash_message', 'すでに購入済みです');
            // アイデアの投稿者でないか？
        }elseif($contributor){
            return redirect('post-idea/' . $id)->with('flash_message', '投稿者は購入できません');
        }else{

            // 購入が発生した場合にアイデアに購入済みフラグをつける
            if($idea->buy_flg === 0){
                $idea->buy_flg = 1;
            }
            // 購入者と出品者にメールを送信
            Mail::to($user->email)->send(new IdeaBoughtMail($user));

            Mail::to($idea->user->email)->send(new IdeaSoldMail($idea->user));

            //購入データの登録
            DB::table('buy_ideas')->insert([
                'idea_id' => $id,
                'user_id' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ]);
                

                return redirect('post-idea/' . $id);
        }
    }

    public function postReview(Request $request, $id){

        if(!Auth::check()){

            return redirect('/')->with('flash_message', '未購入のユーザーは投稿できません');

            }
                $user = Auth::user();

                $exists = DB::table('buy_ideas')->where('user_id', $user->id)->where('idea_id', $id)->exists();

                if(!$exists){

                    return redirect('/')->with('flash_message', '未購入のユーザーは投稿できません');
                }

        DB::table('reviews')->insert([
            'review' => $request->idea-review,
            'user_id' => Auth::user(),
            'rating' => $request->rating,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('/')->with('flash_message', 'レビューを投稿しました');
    }
    
    public function show($id){
        $idea = Idea::find($id);
        return view('post-idea.idea', ['idea' => $idea]);
    }
}
