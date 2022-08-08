<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
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
            'to' => 'required|min:5',
            'subject' => 'required|min:10',
            'message' => 'required',
        ];

    }
    public function messages()
    {

        return CustomMessagesValidation;
    }
    public function attributes()
    {
        return [
            'to' => 'ایمیل گیرنده ',
            'subject' => 'عنوان',
            'message' => 'پیغام'
        ];
    }

}
