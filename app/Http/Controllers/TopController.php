<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use App\Category;
use App\Review;

class TopController extends Controller
{
    public function index(){

        $categories = Category::all();
        $ideas = Idea::all()->take(3);

        // 口コミの平均値を$ideasに格納する
        $reviews = Review::all()->take(4);
        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        // dd($ideas[0]->countReview);
        $pickupCategories =  Category::all()->take(6);

        return view('index', ['ideas' => $ideas, 'categories' => $categories, 'pickupCategories' => $pickupCategories, 'reviews' => $reviews]);
    }

}
