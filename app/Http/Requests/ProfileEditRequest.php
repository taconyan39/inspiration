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
            'name' => 'required | max:255',
            'email' => 'required | max:255 | email',
            'profile_img' => 'image|file',
        ];
    }
}
