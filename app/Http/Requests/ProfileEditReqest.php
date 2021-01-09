<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UserPasswordRule;
use Illuminate\Support\Facades\Auth;

class ProfileEditReqest extends FormRequest
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
            'name' => 'required | max:255',
            'email' => 'required | max:255 | email',
            'password' => 'max:255 | alpha_dash | min:8',
            'pass_new' => 'max:255 | min:8 | alpha_dash | same:pass_re',
            'profile_img' => 'image|file',
            // 'old_password'    => ['required',
            //     new UserPasswordRule(
            //         $this->user_id
            //     )
            // ],
            // 'password'    => ['required', 'confirmed'],
        ];
    }
}
