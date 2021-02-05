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
        $order = -1;
        $type = -1;
        $category_id = -1;

        if($sort === 'all'){
            $ideas = Idea::orderBy('created_at', 'asc')->paginate(10);
        }else{
            $ideas = Idea::where('category_id', $sort)->paginate(10);
        }

        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        return view('ideas-list', ['categories' => $categories, 'sort' => $sort, 'ideas' => $ideas, 'order' => $order,'category_id' => $category_id, 'type' => $type]);
    }

    public function search(Request $request){
        
        $categories = Category::all();
        $category_id = $request->category_id;

        if($request->type == 2){
            // dd('価格');
            $type = 'price';
        }else{
            // dd('日付');
            $type = 'created_at';
        }

        if($request->order == 2){
            // dd('下から');
            $order = 'asc';
        }else{
            // dd('上から');
            $order = 'desc';
        }

        if($category_id < 0){
            $ideas = Idea::orderBy($type, $order)->paginate(10);
        }else{
            $ideas = Idea::where('category_id', $category_id)->orderBy($type, $order)->paginate(10);
        }

        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        // dd($request->category_id);

        // return redirect()->action('IdeasListController@searchList');
        return view('ideas-list', ['categories' => $categories, 'ideas' => $ideas, 'order' => $request->order, 'type' => $request->type, 'category_id' => $category_id]);
    }
    public function searchList($request){
        
        $categories = Category::all();
        $category_id = $request->category_id;

        if($request->type == 2){
            // dd('価格');
            $type = 'price';
        }else{
            // dd('日付');
            $type = 'created_at';
        }

        if($request->order == 2){
            // dd('下から');
            $order = 'asc';
        }else{
            // dd('上から');
            $order = 'desc';
        }

        if($category_id < 0){
            $ideas = Idea::orderBy($type, $order)->paginate(10);
        }else{
            $ideas = Idea::where('category_id', $category_id)->orderBy($type, $order)->paginate(10);
        }

        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        return view('ideas-list', ['categories' => $categories, 'ideas' => $ideas, 'order' => $request->order, 'type' => $request->type, 'category_id' => $category_id]);
    }
}
