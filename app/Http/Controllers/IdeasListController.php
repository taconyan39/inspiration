<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use App\Category;

class IdeasListController extends Controller
{
    public function showList(){

        $categories = Category::all();
        $ideas = Idea::paginate(10);
        $sort = '';

        return view('ideas-list', ['ideas' => $ideas, 'categories' => $categories, 'sort' => $sort]);
    }
}
