<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostIdeasController extends Controller
{
    public function changeInterest($id){

        // $user = Auth::user();
        // $idea = Idea::find($id);

        // echo $user->id;


        // $interest_flg = DB::table('interests')->where('user_id', Auth::user()->id)->where('idea_id', $id)->exists();


        return 'test';

    }

    public function interest(Request $request, $id){

        if($request->interest){
            DB::table('interests')->insert([
                'idea_id' => $id,
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            $interest_flg = true;
        }else{
            echo 'false';
            DB::table('interests')
                ->where('user_id', Auth::user()->id)->where('idea_id', $id)
                ->delete();
            $interest_flg = false;
        }

        // return $interest_flg;
    }

    public function interest(Request $request ,$id){

        // dd($request->interest);
        if($request->remove){
            // dd('remove');
            DB::table('interests')->where('user_id', Auth::user()->id)->where('idea_id', $id)->delete();
        }elseif($request->interest){
            // dd();
            DB::table('interests')->insert([
                'idea_id' => $id,
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        return redirect('post-idea/' . $id);
    }
}
