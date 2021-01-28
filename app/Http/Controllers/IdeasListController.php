<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use App\Category;

class IdeasListController extends Controller
{
    
    // public function index($sort){
    public function index(){
        // if($sort === 'all'){
        //     $ideas = Idea::paginate(10);
        // }else{
        //     $ideas = Idea::where('category_id', '=', $sort)->orderBy('created_at', 'desc')->paginate(10);
        // }
        // $ideas = Idea::paginate(10);

        $categories = Category::all();

        return view('ideas-list', ['categories' => $categories]);
    }
}
