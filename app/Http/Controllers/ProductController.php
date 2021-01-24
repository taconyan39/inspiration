<?php

namespace App\Http\Controllers;

use App\Notifications\NewProductArrived;
use Illuminate\Http\Request;
use NotificationChannels\Twitter\TwitterChannel;

class ProductController extends Controller
{
    public function create() {

        return view('product.create');

    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer|min:0',
            // 'image' => 'required|image'
        ]);

        $product = new \App\Product();
        $product->name = $request->name;
        $product->price = $request->price;
        // $product->attach('product_image', $request->image);
        $result = $product->save();

        // ツイッターに投稿
        \Notification::route(TwitterChannel::class, '')->notify(new NewProductArrived($product));

        return ['result' => $result];

    }
}
