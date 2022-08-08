<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
            'title' => 'nullable|min:5',
            'thumb' => 'required',
        ];
    }
    public function messages()
    {
        return CustomMessagesValidation;
    }
    public function attributes()
    {
        return [
            'title' => 'عنوان گالری',
            'thumb' => 'تصویر',
        ];
    }

}
