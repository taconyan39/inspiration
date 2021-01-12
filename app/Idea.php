<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $fillable = ['name','price', 'summary', 'content','user_id','caetgory_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function category(){
        return $this->belongsTo('App\Category');
    }

    // public function reactions(){
    //     return $this->hasMany('App\UserReaction');
    // }

    public function reviews(){
        return $this->hasMany('App\Review');
    }

    // public function reviews(){
    //     return $this->hasMany('App\Review');
    // }
}
