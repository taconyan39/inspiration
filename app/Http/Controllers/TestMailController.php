<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class TestMailController extends Controller
{
    public function send(){

        $user = \App\User::find(2);
        return Mail::to($user->email)->send(new SendMail());
    }
}
