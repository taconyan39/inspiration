<?php

namespace App\Notifications;

use App\Product;
use Illuminate\Notifications\Notification;
use NotificationChannels\Twitter\TwitterChannel;
use NotificationChannels\Twitter\TwitterStatusUpdate;

class NewProductArrived extends Notification
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function via($notifiable)
    {
        return [TwitterChannel::class];
    }

    public function toTwitter($notifiable)
    {
        $text = "新着！\n【". $this->product->name ."】という商品が登録されました\n".
                url('product/'. $this->product->id);
        $attachment = $this->product->getAttachment('product_image');
        return (new TwitterStatusUpdate($text))->withImage($attachment->path);
    }
}
