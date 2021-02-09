<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Idea;
use App\Sort;
use App\Category;

class IdeasListController extends Controller
{
    
    // public function index($sort){
    public function index(Request $request){

        $categories = Category::all();
        $sorts = Sort::all();

        // $form = $request->all();
        // unset($form['_token']);
        // unset($request->_token);

        // $sort = collect(
        //     ['id' => 1, 'name' => '投稿が新しい順'],
        //     ['id' => 2,'name' => '投稿が古い順'],
        //     ['id' => 3, 'name' => '価格が高い順'],
        //     ['id' => 4, 'name' => '投稿が安い順']
        // );

        // dd($sort);

        $data = [
            'sort_id' => $request->get('sort_id'),
            'category_id' => $request->get('category_id'),
        ];

        // dd($data['category_id']);
        switch($data['sort_id']){
            case 2:
                $type = 'created_at';
                $order = 'asc';
                break;
            case 3:
                $type = 'price';
                $order = 'desc';
                break;
            case 4:
                $type = 'price';
                $order = 'asc';
                break;
            default:
                $type = 'created_at';
                $order = 'asc';
                break;
        }

        // dd($data['sort_id']);

        // if($data['type'] == 2){
        //     $type = 'price';
        // }else{
        //     $type = 'created_at';
        // }

        // if($data['order'] == 2){
        //     $order = 'asc';
        // }else{
        //     $order= 'desc';
        // }

        if(!$data || $data['category_id'] < 1 ){
            $ideas = Idea::orderBy($type, $order)->paginate(5);
        }else{
            $ideas = Idea::where('category_id', $data['category_id'])->orderBy($type, $order)->paginate(5);
        }

        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        return view('ideas-list.ideas-list', ['categories' => $categories, 'ideas' => $ideas, 'data' => $data, 'sorts' => $sorts]);
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

        // dd((int)$request->order);
        // dd($request->category_id);

        // return redirect()->action('IdeasListController@searchList');
        return view('ideas-list', ['categories' => $categories, 'ideas' => $ideas, 'order' => $request, 'type' => $request->type, 'category_id' => $category_id]);
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

    public function myidea(){
        $categories = Category::all();
        $user = Auth::user();
        $ideas = Idea::where('user_id', $user->id)->paginate(10);

        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        return view('ideas-list.myidea-list', ['user' => $user ,'ideas' => $ideas, 'categories' => $categories]);
    }

    // お気に入りリスト
    public function interest(){
        $categories = Category::all();
        $user = Auth::user();
        $user_id = $user->id;
        $ideas = Idea::whereHas('interests', function($q) use ($user_id){
            $q->whre('user_id', $user_id);
        })->paginate(10);

        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        return view('ideas-list.myidea-list', ['user' => $user ,'ideas' => $ideas, 'categories' => $categories]);
    }
    
}
