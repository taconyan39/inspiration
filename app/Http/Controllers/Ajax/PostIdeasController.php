<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostIdeasController extends Controller
{
    public function changeInterest($id){

        $flg = DB::table('interests')->where('user_id', Auth::user()->id)->where('idea_id', $id)->exists();

        return ['flg' => $flg];

    }

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

}
