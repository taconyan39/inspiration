<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Idea;

class TestController extends Controller
{
    public function test(){

        // dd('テスト');
        $ideas = Idea::all();
        $categories = Category::all();
        $users = User::all();
        // dd($ideas[0]->user);
        return view('test', ['ideas' => $ideas, 'categories' => $categories, 'users' => $users ]);
    }
}
