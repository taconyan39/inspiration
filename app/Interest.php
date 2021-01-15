<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    public function idea(){
        return $this->belongsTo('App\Idea');
    }

    public function users(){
        $this->hasOneThrough('App\User','App\Idea','user_id');
    }
}
