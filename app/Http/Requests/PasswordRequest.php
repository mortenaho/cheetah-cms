<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'current_password'=>'required|min:6',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ];
    }
    public function messages()
    {
        return CustomMessagesValidation;
    }
    public function attributes()
    {
        return [
            'current_password'=>'کلمه عبور فعلی',
            'password' => 'کلمه عبور ',
            'password_confirmation' => 'تکرار کلمه عبور ',
        ];
    }
}
