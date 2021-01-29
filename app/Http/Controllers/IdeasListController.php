<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use App\Category;

class IdeasListController extends Controller
{
    
    // public function index($sort){
    public function index($sort){

        $categories = Category::all();

        return view('ideas-list', ['categories' => $categories, 'sort' => $sort]);
    }
}
