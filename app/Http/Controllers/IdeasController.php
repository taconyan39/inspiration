<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use App\Category;
use App\User;

class IdeasController extends Controller
{
    public function index(){

        $categories = Category::all();
        $ideas = Idea::all()->take(3);

        // dd($ideas[0]->category->name);
        $pickupCategories =  Category::all()->take(6);

        return view('index', ['ideas' => $ideas, 'categories' => $categories, 'pickupCategories' => $pickupCategories]);
    }
}
