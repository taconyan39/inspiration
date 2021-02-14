<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UserPasswordRule;
use Illuminate\Support\Facades\Auth;

class ProfileEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function all($keys = null)
    {
        $results = parent::all($keys);

        $this->user_id = Auth::user()->id;

        return $results;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required | max:10',
            'email' => 'required | max:255 | email',
            // 'icon_img' => 'image | file | max:2000 | mimes:jpeg, jpg, png',
            'icon_img' => 'image | file | max:2000 | mimes:jpg,png',
        ];
    }

    public function messages(){
        return [
            'icon_img.max' => '2M以下のファイルを選択してください',            
        ];
    }
}
