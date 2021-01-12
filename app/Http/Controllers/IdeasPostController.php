<?php

namespace App\Http\Controllers;

// use 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Idea;

class IdeasPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // dd($categories);
        

        return view('idea-post', ['user' => $user, 'categories' => $categories]);
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


        return redirect('home')->with('flash_message', __('Registered.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
