<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Idea;
use App\Review;

class TestController extends Controller
{
    public function get(){

        $reviews = Review::where('user_id', 1)->avg('rating');
        // dd(round($reviews, 1));
        dd(Review::where('idea_id', 3)->avg('rating'));
        $rating = [];
        foreach($rating as $key){
            $rating = mt_rand(0,4);
        }
        dd(mt_rand(0,4));
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
}
