<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller,
    Session;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo() {

        // sessionにユーザーネームと画像を入れておく

        $user = Auth::user();
        Session::put([
            'name' => $user->name, 'icon_img' => $user->icon_img,
            'introduction' => $user->introduction
            ]);

        session()->flash('flash_message', 'ログインしました');
        return '/mypage';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
