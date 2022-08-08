<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialRequest extends FormRequest
{
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
            'title' => 'required',
            'icon' => 'required|min:6',
            'link' => 'url|nullable',
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
            'icon' => 'آیکون',
            'link' => 'آدرس اینترنتی',
        ];
    }

}
