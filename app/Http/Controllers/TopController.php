<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use App\Category;
use App\Review;
use Illuminate\Support\Facades\DB;
// use Carbon\Carbon;

// トップページ表示用のクラス
class TopController extends Controller
{
    // トップページの表示
    public function index(){

        $categories = Category::all();
        $ideas = Idea::latest()->take(3)->get();
        $month1_ago =  date('Y-m-d', strtotime("-1 month"));

        $attentionIdeas = Idea::withCount('interests')->orderBy('interests_count', 'desc')->paginate(5);

        $hotIdeas = Idea::withCount('buyIdeas')->orderBy('buy_ideas_count', 'desc')->paginate(5);

        // $attentionIdeas = Idea::whereHas('interests', function($q) use ($month1_ago){
        //         $q->where('created_at', '>=', $month1_ago);
        //     })->withCount('interests')->orderBy('interests_count', 'desc')->take(5);
        // dd($attentionIdeas);

        // $month1_ago = date('Y-m-d', strtotime("-1 month"));

        // １ヶ月で多く「気になる」されたアイデアをピックアップする

        // $attentionIdeas = Idea::whereHas('interests', function($q) use ($month1_ago){
        //     $q->select(DB::raw('idea_id, COUNT(idea_id) AS idea_id_count'))
        //     ->groupBy('idea_id')
        //     ->orderBy('idea_id_count', 'desc')
        //     ->where('created_at', '>', $month1_ago);
        // })->take(10);

        // $attentionIdeas = Idea::withCount('interestsRanking')->orderBy('interestsRanking_count', 'desc')->take(10);

        // dd($attentionIdeas);

        $reviews = Review::latest()->take(4)->get();

        // 口コミの平均値を$ideasに格納する
        foreach($ideas as $idea){
            $idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $idea->countReview = $idea->reviews->count();
        }

        foreach($attentionIdeas as $attentionIdea){
            $attentionIdea->rating = sprintf('%.1f',$attentionIdea->reviews->avg('rating'));
            $attentionIdea->countReview = $attentionIdea->reviews->count();
        }
        foreach($hotIdeas as $hotIdea){
            $hotIdea->rating = sprintf('%.1f',$hotIdea->reviews->avg('rating'));
            $hotIdea->countReview = $hotIdea->reviews->count();
        }

        foreach($reviews as $review){
            $review->idea->rating = sprintf('%.1f',$idea->reviews->avg('rating'));
            $review->idea->countReview = $idea->reviews->count();
        }

        $pickupCategories =  Category::all()->take(6);

        return view('index', ['ideas' => $ideas, 'categories' => $categories, 'pickupCategories' => $pickupCategories, 'reviews' => $reviews, 'attentionIdeas' => $attentionIdeas, 'hotIdeas' => $hotIdeas]);
    }

}
