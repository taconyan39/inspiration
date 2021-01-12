<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReaction extends Model
{
    
    public function idea(){
        return $this->belongsTo('App\Idea');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    // public function reac(){
    //     return $this->belongsTo('App\Idea');
    // }

}
