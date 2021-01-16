<?php

namespace App\Http\Controllers;

// use 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Idea;
use App\Review;

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

        $postIdeas = $user->ideas()->where('user_id',$user->id)->orderBy('created_at', 'desc')->get()->take(10); 
        //             // ->paginate(10);
        // dd(DB::table('i'));
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
        $categories = Category::all();
        
        

        return view('post-idea.create', ['user' => $user, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // 新規アイデアの投稿処理
    public function store(Request $request)
    {
        $idea = new Idea;

        // Auth::user()->ideas->save($idea->fill($request->all()));
        $idea->category_id = (int)$request->category_id;

        $idea->user_id = Auth::user()->id;

        $idea->fill($request->all())->save();


        return redirect('home')->with('flash_message', '投稿しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $idea = Idea::find($id);
        $idea->rating = $idea->reviews()->avg('rating');
        $idea->countReview = $idea->reviews->count();

        dd($user);
        $ideaReviews = DB::table('reviews')->join('ideas','reviews.idea_id','=','ideas.id')
                    ->where('ideas.id', $id)->orderBy('reviews.created_at', 'desc')->take(5)
                    ->get();

        return view('post-idea.show',[ 'user' => $user, 'idea' => $idea, 'ideaReviews' => $ideaReviews]);
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
        $idea = Idea::find($id);

        $categories = Category::all();
        return view('post-idea.edit',[ 'categories' => $categories, 'user' => $user, 'idea' => $idea]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $idea = Idea::find($id);
        unset($form['_token']);
        $idea->fill($request->all())->save();
        return redirect('/post-idea/index')->with('flash_message','変更しました');
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
        return redirect('post-idea/index')->with('flash_message', '削除しました');
    }
}
