<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyIdea extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function ideas($id){
        return $this
                ->with('ideas')
                ->where('user_id',$id)
                ->get();
    }
}
