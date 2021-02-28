<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Review;

class ReviewsController extends Controller
{
    public function show($id){
        
        // レビューの一覧を表示
        $reviews = Review::where('idea_id', $id)->with('user','idea')->orderBy('created_at', 'desc')->paginate(5);

        return $reviews;
    }

}

