<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
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
            'password' => 'required',
            'email' => 'required|email',
//            'g-recaptcha-response' => 'required|captcha'
        ];
    }
    public function messages()
    {
        return CustomMessagesValidation;
    }
    public function attributes()
    {
        return [
            'password' => 'کلمه عبور',
            'email' => 'ایمیل',
//            'g-recaptcha-response' => "من ربات نیستم",
        ];
    }
}
