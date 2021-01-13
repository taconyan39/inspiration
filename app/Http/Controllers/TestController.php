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
        dd(round($reviews, 1));
        $ideas = '';
        $categories = '';
        $users = '';
        foreach ($reviews as $review) {
            echo $review->rating;
        }
        return view('test', ['ideas' => $ideas, 'categories' => $categories, 'users' => $users ]);
    }
    public function post($id){

        dd($id);

        $ideas = Idea::all();
        $categories = Category::all();
        $users = User::all();
        // dd($ideas[0]->user);
        return view('test', ['ideas' => $ideas, 'categories' => $categories, 'users' => $users ]);
    }
}
