<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    
    public function ideas(){
        return $this->hasMany('App\Idea');
    }
}
