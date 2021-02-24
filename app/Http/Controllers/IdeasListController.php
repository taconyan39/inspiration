<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Idea;
use App\Sort;
use App\Category;

class IdeasListController extends Controller
{

    public function index(Request $request){
        
        // アイデア一覧
        $categories = Category::all();
        $sorts = Sort::all();

        $data = [
            'sort_id' => $request->get('sort_id'),
            'category_id' => $request->get('category_id'),
        ];


        // ソートの条件を変数に入れる
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
                $order = 'desc';
                break;
        }

        if(!$data['category_id']){
            // カテゴリがない場合の処理
            $ideas = Idea::orderBy($type, $order)->paginate(10);
        }else{
            // カテゴリ検索がある場合の処理
            $ideas = Idea::where('category_id', $data['category_id'])->orderBy($type, $order)->paginate(10);
        }

        // アイデアの口コミを代入する
        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        return view('ideas-list.all-ideas-list', ['categories' => $categories, 'ideas' => $ideas, 'data' => $data, 'sorts' => $sorts]);
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

    // 投稿ページ一覧
    public function myidea(){

        if(Auth::check()){
            $user = Auth::user();
            $user_img = $user->icon_img;
        }else{
            $user = false;
            $user_img = 'noimage_icon.png';
        }
        
        $categories = Category::all();
        $user = Auth::user();
        $ideas = Idea::where('user_id', $user->id)->orderBy('created_at','desc')->paginate(10);

        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        return view('ideas-list.myideas-list', ['user' => $user ,'ideas' => $ideas, 'categories' => $categories, 'user_img' => $user_img]);
    }

    // お気に入りリスト
    public function interest(){

        $user = Auth::user();

        $categories = Category::all();
        $user_id = $user->id;

        $ideas = Idea::whereHas('interests', function($q) use ($user_id){
            $q->where('user_id', $user_id);
        })->paginate(10);

        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        return view('ideas-list.interests-list', ['user' => $user ,'ideas' => $ideas, 'categories' => $categories]);
    }

    public function interestRemove(Request $request){
        $user = Auth::user();

        DB::table('interests')->where('user_id', $user->id)->where('idea_id', $request->idea_id)->delete();

        return redirect(url()->previous())->with('flash_message', 'お気に入り解除しました');
    }
    
    public function buyIdeas(){
        // 購入したアイデアの一覧
        $user = Auth::user();

        $categories = Category::all();
        $user_id = $user->id;

        $ideas = Idea::whereHas('buyIdeas', function($q) use ($user_id){
            $q->where('user_id', $user_id);
        })->paginate(10);

        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        return view('ideas-list.buy-ideas-list', ['user' => $user ,'ideas' => $ideas, 'categories' => $categories]);

    }
}
