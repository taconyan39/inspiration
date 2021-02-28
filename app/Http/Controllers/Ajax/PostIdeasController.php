<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Idea;

// アイデア投稿フォームのAjax処理
class PostIdeasController extends Controller
{
    // お気に入りの操作
    public function changeInterest($id){

        $flg = DB::table('interests')->where('user_id', Auth::user()->id)->where('idea_id', $id)->exists();

        return ['flg' => $flg];

    }

    // お気に入りの状態を取得
    public function interest(Request $request, $id){

            if($request->flg){
            DB::table('interests')->insert([
                'user_id' => Auth::user()->id,
                'idea_id' => (int)$id,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ]);
                return ['flg' => true];

            }else{
                DB::table('interests')
                ->where('user_id', Auth::user()->id)->where('idea_id', $id)
                ->delete();
                return ['flg' => false];
            }
            
    }

    // 編集ページのアイデア情報を取得
    public function editAjax($id){

        $idea = Idea::find($id);

        return $idea;
    }

}
