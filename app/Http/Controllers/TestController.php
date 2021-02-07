<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Review;
use App\Idea;

class TestController extends Controller
{
    public function get(Request $request ,$sort){
        // dd(url());
        // dd($url);
        // $user_id = Auth::user()->id;
        // // dd($user_id);

        // $reviews = Review::whereHas('idea', function($q) use ($user_id){
        //     $q->where('user_id', $user_id);
        // })->get();

        // dd($reviews);

        $request->flash();

         $data = [
         'get'           => $request->get('a'),
         'input'         => $request->input('a'),
         'request_get'   => $request->request->get('a'),
         'query_get'     => $request->query->get('a'),
         'query'         => $request->query('a'),
         'all'           => var_export($request->all(), true),
         'only'          => var_export($request->only(['a', 'b']), true),
         'except'        => var_export($request->except(['b']), true),
         ];

        return view('test', $data);

        $ideas = Idea::paginate(10);
        // dd($ideas);

        $request = null;
        return view('test',['ideas' => $ideas, 'request' => $request]);
    }

    public function post(Request $request){


        if($request === 2){

            $sort = 'desc';
        }else{
            $sort = 'asc';
        }
        $ideas = Idea::orderBy('price', $sort)->paginate(10);
        // dd($request);

        return view('test', ['ideas' => $ideas, 'request' => $request]);
    }
}
