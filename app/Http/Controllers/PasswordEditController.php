<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PasswordEditRequest;
use Illuminate\Support\Facades\Hash;
use App\Notifications\PasswordEdit;

class PasswordEditController extends Controller
{
    public function edit(){
        return view('auth/passwords/password-edit');
    }

    public function update(PasswordEditRequest $request){
        // dd($request);
        $user = Auth::user();


            $request->user()->fill([
                'password' => Hash::make($request->password)
            ])->save();

            // パスワード変更をメールで通知
            // TODONotificationをつけて作り直す
            $user->notify(new PasswordEdit);

            return redirect('/profile')->with('flash_message', 'パスワードが変更されました');

        // if (Hash::check('plain-text', $hashedPassword)) {
        //     // パスワード一致
        // }

        // $request->user()->fill([
        //     'password' => Hash::make($request->newPassword)
        // ])->save();

    }
}
