<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileEditRequest;
// use Illuminate\Support\Facades\Storage;
use Storage;

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

        // get instance
        $img = \Image::make($image);

        $file_name = Storage::disk('s3')->put('/', $image, 'public');

        dd($file_name);
        // resize
        $img->fit(150, 150, function($constraint){
            $constraint->upsize();
        });

        // dd($img);

        // save
        // $file_name = 'icon_'.$id.'.'.$image->getClientOriginalExtension();

        $file_name = Storage::disk('s3')->put('/', $img, 'public');
        // $file_name = Storage::disk('s3')->put('/', $image, 'public');

        dd($file_name);

        $save_path = 'public/images/icons/' .$file_name;

        Storage::put($save_path, (string) $img->encode());

        // return file name
        return $file_name;
    }
}
