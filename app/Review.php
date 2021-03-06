<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    public function idea(){
        return $this->belongsTo('App\Idea');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function category(){
        return $this->hasOneThrough('App\Category', 'App\Category');
    }
    public function ideaUser(){
        return $this->hasOneThrough('App\User', 'App\Idea');
    }


}
