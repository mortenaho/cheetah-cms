<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'title' => 'required|min:5',
            'site_name' => 'required|min:5',
            'email' => 'email|nullable',
            'contact_info' => 'email|nullable',
        ];
    }
    public function messages()
    {
        return CustomMessagesValidation;
    }
    public function attributes()
    {
        return [
            'title' => 'عنوان ',
            'site_name' => 'نام سایت',
            'email' => 'ایمیل',
        ];
    }

}
