<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileEditRequest;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit(){

        $user = Auth::user();
        $user_img = $user->icon_img;

        return view('profile', ['user' => $user, 'user_img' => $user_img]);
    }

    public function update(ProfileEditRequest $request)
    {
        $user = Auth::user();
        $form = $request->all();
        $id = $user->id;

        $profileImage = $request->file('icon_img');
        if ($profileImage != null) {
            $form['icon_img'] = $this->saveProfileImage($profileImage, $id); // return file name
        }

        unset($form['_token']);
        unset($form['_method']);
        $user->fill($form)->save();


        return redirect('/mypage')->with('flash_message', 'プロフィールを変更しました');
    }

    private function saveProfileImage($image, $id) {

        $user = Auth::user();
        // get instance
        $img = \Image::make($image);
        // resize
        $img->fit(150, 150, function($constraint){
            $constraint->upsize();
        });

        // save
        $file_name = 'icon_'.$id.'.'.$image->getClientOriginalExtension();

        $save_path = $file_name;
        put('images/icons/'.$file_name, (string) $img->encode(), 'public');

        $file_name = url($save_path);
        $user->save();

        // return file name
        return $file_name;
    }
}
