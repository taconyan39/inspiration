<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Idea;

class IdeasListController extends Controller
{
    // public function index($sort) {
    public function index() {
        // echo 'test';

        // return Idea::paginate(10);

        // if($sort === 'all'){
        //     $ideas = Idea::pagenate(10);
        // }else{
        //     $ideas = Idea::where('category_id', '=', $sort)->orderBy('created_at', 'desc')->paginate(10);
        // }


        $ideas = Idea::with('user','category', 'reviews')->paginate(10);

        // TODO まとめられないか? サービスプロバイダ?
        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        return $ideas;
    }
}
