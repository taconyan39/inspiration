<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostIdeaRequest extends FormRequest
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
            'category_id' => 'required',
            'title' => 'required | max:20',
            'summary' => 'required | max:50',
            'price' => 'required | max:255 | integer ',
            'content' => 'required | max:5000',
        ];
    }
}
