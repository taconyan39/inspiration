<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use App\Category;
use App\Review;
use Carbon\Carbon;

class TopController extends Controller
{
    public function index(){

        $categories = Category::all();
        // $ideas = Idea::latest()->get();
        $ideas = Idea::latest()->take(3)->get();

        $reviews = Review::latest()->take(4)->get();

        // 口コミの平均値を$ideasに格納する
        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        foreach($reviews as $review){
            $review->idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $review->idea->countReview = $idea->reviews->count();
        }

        $pickupCategories =  Category::all()->take(6);

        return view('index', ['ideas' => $ideas, 'categories' => $categories, 'pickupCategories' => $pickupCategories, 'reviews' => $reviews]);
    }

}
