<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Review;
use App\Idea;

class TestController extends Controller
{
    public function get(){

        $user_id = Auth::user()->id;
        // dd($user_id);

        $reviews = Review::whereHas('idea', function($q) use ($user_id){
            $q->where('user_id', $user_id);
        })->get();

        dd($reviews);

        // dd($reviews[0]);
        // return view('test')->with(
            // ['idea' => $idea]
        // );
    }
}
