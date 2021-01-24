<?php

namespace App\Http\Controllers;

use App\Notifications\NewProductArrived;
use Illuminate\Http\Request;
use NotificationChannels\Twitter\TwitterChannel;
use Abraham\TwitterOAuth\TwitterOAuth;

class ProductController extends Controller
{
    public function create() {

        return view('product.create');

    }

    public function store(Request $request) {

        // $request->validate([
        //     'name' => 'required|string',
        //     'price' => 'required|integer|min:0',
        //     // 'image' => 'required|image'
        // ]);

        // $product = new \App\Product();
        // $product->name = $request->name;
        // $product->price = $request->price;
        // // $product->attach('product_image', $request->image);
        // $result = $product->save();

        // // ツイッターに投稿
        // \Notification::route(TwitterChannel::class, '')->notify(new NewProductArrived($product));

        // // return view('') ['result' => $result];
        // return redirect('product.create');

        // $twitter = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'),
        //     env('TWITTER_CONSUMER_SECRET'),
        //     env('TWITTER_ACCESS_TOKEN'),
        //     env('TWITTER_ACCESS_SECRET'));

        // $twitter->post("statuses/update", [
        //     "status" =>
        //         'test'
        // ]);

        // return view('product.create');

    }
}
