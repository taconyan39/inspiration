<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileEditRequest;
use Illuminate\Support\Facades\Storage;
use App\Notifications\NotificationTest;
use App\User;

class ProfileController extends Controller
{
    public function edit(){

        $user = Auth::user();
        // dd($user);
        return view('profile', ['user' => $user])->with(['string' => '文字列']);
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
        $disk = Storage::disk('s3');
        $file_name = 'icon_'.$id.'.'.$image->getClientOriginalExtension();

        $save_path = 'images/icons/'.$file_name;
        $disk->put('images/icons/'.$file_name, (string) $img->encode(), 'public');

        $file_name = $disk->url($save_path);
        $user->save();

        // return file name
        return $file_name;
    }
}
