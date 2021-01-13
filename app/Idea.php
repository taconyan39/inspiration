<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $fillable = ['title','price', 'summary', 'content','caetgory_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function reviews(){
        return $this->hasMany('App\Review');
    }

    public function buyIdea(){
        return $this->hasMany('App\BuyIdea');
    }

}
