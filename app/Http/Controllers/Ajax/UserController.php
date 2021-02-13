<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function user(){
        if(Auth::check()){
            $user = Auth::user();
        }else{
            $user = false;
        }

    return $user;
    }
}
