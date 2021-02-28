<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $fillable = ['title','price', 'summary', 'content','caetgory_id', 'sold_flg'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function reviews(){
        return $this->hasMany('App\Review');
    }

    public function interests(){
        return $this->hasMany('App\Interest')->orderBy('createt_at', 'desc');
    }

    public function buyIdeas(){
        return $this->hasMany('App\BuyIdea')->orderBy('created_at', 'desc');
    }

}
