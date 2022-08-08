<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'full_name' => 'required|min:5',
            'message' => 'required|min:10',
        ];

    }
    public function messages()
    {

        return CustomMessagesValidation;
    }
    public function attributes()
    {
        return [
            'email' => 'ایمیل ',
            'full_name' => 'نام و نام خانوادگی',
            'message' => 'پیام',

        ];
    }

}
