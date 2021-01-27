<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function get(){

        $idea = \App\Idea::find(1);
        // dd($idea);
        return view('test')->with(
            ['idea' => $idea]
        );
    }
}
