<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdeaPostRequest extends FormRequest
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
            'idea_name' => 'required | max:20',
            'category' => 'required',
            'summary' => 'required | max:50',
            'price' => 'required | max:255 | integer | It:1000000',
            'idea_content' => 'required | max:5000',
        ];
    }
}
