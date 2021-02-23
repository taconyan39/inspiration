<?php

namespace App\Http\Controllers;

// use 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Idea;
use App\Review;
use App\BuyIdea;
use App\Http\Requests\PostIdeaRequest;

class PostIdeasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $categories = Category::all();
        

        $postIdeas = $user->ideas()->where('user_id',$user->id)->orderBy('created_at', 'desc')->paginate(10);


        return view('post-idea.index', ['user' => $user, 'categories' => $categories,'postIdeas' => $postIdeas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //新規アイデア投稿ページへの遷移
    public function create()
    {
        $user = Auth::user();
        $user_img = $user->icon_img;
        $categories = Category::all();

        return view('post-idea.create', ['user' => $user, 'categories' => $categories, 'user_img' => $user_img]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // 新規アイデアの投稿処理
    public function store(PostIdeaRequest $request)
    {
        dd('test');
        $idea = new Idea;

        $idea->category_id = (int)$request->category_id;

        $idea->user_id = Auth::user()->id;

        $idea->fill($request->all())->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!ctype_digit($id)){
            return redirect('mypage')->with('flash_message', __('Invalid operation was performed.'));
        }

        $user = Auth::user();

        $idea = Idea::find($id);
        $idea->rating = sprintf('%.1f',$idea->reviews()->avg('rating'));
        $idea->countReview = $idea->reviews->count();

        // 投稿者でなかった場合に通常の商品ページに移動
        if($user->id !== $idea->user_id){
            return redirect('idea/'. $id);
        }

        // アイデアに投稿されたレビューとその情報を取得
        $reviews = Review::all()->where('idea_id', $id)->take(5);
        
        return view('post-idea.myidea',[ 'user' => $user, 'idea' => $idea, 'reviews' => $reviews]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $user_img = $user->icon_img;
        $idea = Idea::find($id);

        $query = BuyIdea::where('idea_id', $id);

        // 購入がある場合はページにアクセスできないようにする
        if($idea->buy_flg){

            return redirect('mypage')->with('flash_message', '購入されたアイデアは編集できません');
        }


        $categories = Category::all();
        return view('post-idea.edit',[ 'categories' => $categories, 'user' => $user, 'idea' => $idea, 'user_img' => $user_img]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostIdeaRequest $request, $id)
    {
        $idea = Idea::find($id);
        $idea->fill($request->all())->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Idea::find($id)->delete();
        return redirect('mypage')->with('flash_message', '削除しました');
    }

    public function delete($id){
        Idea::find($id)->delete();
        return redirect('mypage')->with('flash_message', '削除されました');
    }


}
