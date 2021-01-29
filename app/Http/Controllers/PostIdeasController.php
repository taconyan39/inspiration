<?php

namespace App\Http\Controllers;

// use 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Category;
use App\Idea;
use App\Review;
use App\BuyIdea;
use App\Mail\IdeaSoldMail;
use App\Mail\IdeaBoughtMail;

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
        if(!ctype_digit($id)){
            return redirect('/drills/new')->with('flash_message', __('Invalid operation was performed.'));
        }
        
        $user = Auth::user();
        $idea = Idea::find($id);
        $idea->rating = sprintf('%.1f',$idea->reviews()->avg('rating'));
        $idea->countReview = $idea->reviews->count();

        
        // 投稿者の場合の表示
        if(DB::table('ideas')->where('id', $idea->id)->where('user_id', $user->id)->exists()){
            // dd('owner');
            $owner_flg = true;
            $buy_flg = false;
            $interest_flg = false;
        }else{
            // dd('not_owner');
            $owner_flg = false;
            // 購入済みの場合の処理
            if(DB::table('buy_ideas')->where('user_id', $user->id)->where('idea_id', $idea->id)->exists()){
                // dd('buy');
                $buy_flg = true;
                $interest_flg = false;
            }else{
                // dd('not_buy');
                $buy_flg = false;
                // 未購入で気になる追加済みの処理
                if(DB::table('interests')->where('user_id', $user->id)->where('idea_id', $idea->id)->exists()){
                    // dd('true');
                    $interest_flg = true;
                    // 未購入気になる未追加の処理
                }else{
                    // dd('falsmyse');
                    $interest_flg = false;
                }
            }
        }
        // dd($idea->user_id);

        
        // レビューを投稿しているか
        $myreview = Review::where('idea_id', $id)->where('user_id', $user->id);

        if($myreview->exists()){
            $myreview = $myreview->first();
        }else{
            $myreview = '';
        }

        // アイデアに投稿されたレビューとその情報を取得
        $reviews = Review::all()->where('idea_id', $id)->take(5);
        
        return view('post-idea.show',[ 'user' => $user, 'idea' => $idea, 'reviews' => $reviews, 'owner_flg' => $owner_flg, 'interest_flg' => $interest_flg, 'buy_flg' => $buy_flg, 'myreview' => $myreview]);
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

        $query = BuyIdea::where('idea_id', $id);

        // 購入がある場合はページにアクセスできないようにする
        if($query->exists()){

            return redirect('mypage')->with('flash_message', '購入されたアイデアは編集できません');
        }


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

    // 購入処理
    public function buy(Request $request ,$id){

        $user = Auth::user();
        $idea = Idea::find($id);
        $contributor = DB::table('ideas')->where('id', $id)->where('user_id', $user->id)->exists();
        $buy_flg = DB::table('buy_ideas')->where('idea_id', $id)->where('user_id',$user->id)->exists();

        // すでに購入済みでないかの確認
        if($buy_flg){
            return redirect('post-idea/' . $id)->with('flash_message', 'すでに購入済みです');
            // アイデアの投稿者でないか？
        }elseif($contributor){
            return redirect('post-idea/' . $id)->with('flash_message', '投稿者は購入できません');
        }else{
            // 購入者と出品者にメールを送信
            Mail::to($user->email)->send(new IdeaBoughtMail($user));

            Mail::to($idea->user->email)->send(new IdeaSoldMail($idea->user));

            //購入データの登録
            DB::table('buy_ideas')->insert([
                'idea_id' => $id,
                'user_id' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ]);
                

                return redirect('post-idea/' . $id);
        }
    }

}
