<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileEditReqest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfileController extends Controller
{
    public function edit(){

        $user = Auth::user();
        // dd($user);
        return view('profile', ['user' => $user]);
    }

    public function update(ProfileEditReqest $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->pass_new);

        // TODO データ更新時の古いデータの削除
        if($file = $request->icon_img){
            $fileName = time() . $file->getClientOriginalName();
            if(!empty($user->icon_img)){
                $target_path = public_path('/images/icon');
                $file->move($target_path, $fileName);
                Storage::delete($target_path . '/' .$user->icon_img);
            }
        }else{
            if(!empty($user->icon_img)){
                $fileName = $user->icon_img;
            }else{
                $fileName = "";
            }
        }

        $user->icon_img = $fileName;
        $user->save();


        return redirect('profile')->with('flash_message', __('Your profile has changed'));
    }
}
