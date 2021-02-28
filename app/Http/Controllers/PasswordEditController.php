<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PasswordEditRequest;
use App\Mail\PasswordEdit;

// パスワード変更用の処理
class PasswordEditController extends Controller
{

    // パスワード変更画面の表示
    public function edit(){
        return view('auth/passwords/password-edit');
    }

    // パスワードの変更処理
    public function update(PasswordEditRequest $request){

        $user = Auth::user();

        $request->user()->fill([
            'password' => Hash::make($request->password)
        ])->save();

        // パスワード変更をメールで通知
        Mail::to($user->email)->send(new PasswordEdit($user));

        return redirect('/profile')->with('flash_message', 'パスワードが変更されました');

    }
}
