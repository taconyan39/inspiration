<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use App\Category;
use App\Review;

class IdeasController extends Controller
{
    public function index(){

        $categories = Category::all();
        $ideas = Idea::all()->take(3);
        $reviews = Review::all()->take(4);
        // dd(Review::all());
        // dd($reviews[0]->idea->summary);

        $pickupCategories =  Category::all()->take(6);

        return view('index', ['ideas' => $ideas, 'categories' => $categories, 'pickupCategories' => $pickupCategories, 'reviews' => $reviews]);
    }

}
