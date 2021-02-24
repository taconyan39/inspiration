<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Idea;
use App\Review;
use Illuminate\Support\Facades\Mail;
use App\Mail\IdeaSoldMail;
use App\Mail\IdeaBoughtMail;
use Carbon\Carbon;

class ShowIdeaController extends Controller
{
    public function show($id){

            if(!ctype_digit($id)){
                return redirect('mypage')->with('flash_message', __('Invalid operation was performed.'));
            }

    
            $user = Auth::user();
            $idea = Idea::find($id);
            $idea->rating = sprintf('%.1f',$idea->reviews()->avg('rating'));
            $idea->countReview = $idea->reviews->count();

            // 投稿者の場合には投稿者用のページに遷移する
            if(!Auth::check()){
                return view('post-idea.idea',['idea' => $idea]);
            }
            if($user->id === $idea->user_id){
                return redirect('post-idea/'. $id);
            }
            

            // 購入済みの場合の処理
            if(DB::table('buy_ideas')->where('user_id', $user->id)->where('idea_id', $idea->id)->exists()){
                $buy_flg = true;
                $interest_flg = false;
            }else{
                $buy_flg = false;
                // 未購入で気になる追加済みの処理
                if(DB::table('interests')->where('user_id', $user->id)->where('idea_id', $idea->id)->exists()){
                    $interest_flg = true;
                    // 未購入気になる未追加の処理
                }else{
                    $interest_flg = false;
                }
            }
            
            // 自分が口コミを投稿したか
            $myreview = Review::where('idea_id', $id)->where('user_id', $user->id);
    
            if($myreview->exists()){
                $myreview = $myreview->first();
            }else{
                $myreview = false;
            }
    
            // アイデアに投稿された口コミとその情報を取得
            $reviews = Review::all()->where('idea_id', $id)->take(5);
            
            return view('post-idea.idea',[ 'user' => $user, 'idea' => $idea, 'reviews' => $reviews, 'interest_flg' => $interest_flg, 'buy_flg' => $buy_flg, 'myreview' => $myreview]);

    }

    // 購入処理
    public function buy(Request $request ,$id){

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
                

                return redirect('idea/' . $id);
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

        return redirect('/')->with('flash_message', '口コミを投稿しました');
    }

}
