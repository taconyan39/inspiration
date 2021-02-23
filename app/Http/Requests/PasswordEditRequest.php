<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UserPasswordRule;
use App\Rules\Half;

class PasswordEditRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => ['max:255 | alpha_dash | min:8 | required',
                // Ruleで現在のパスワードと一致するかの確認を行っている
                new UserPasswordRule(
                    $this->user_id
                )
            ],
            'password' => ['max:255', 'min:8', 'alpha_dash', 'confirmed', new Half,]
        ];
    }
}
