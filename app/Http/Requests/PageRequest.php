<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
        $lang=collect(language)->get("name");
        return [
            'title' => 'required',
            'content' => 'required',
            'language' => 'required|notIn:('.$lang.')',
        ];

    }
    public function messages()
    {

        return CustomMessagesValidation;
    }
    public function attributes()
    {
        return [
            'content' => 'محتوا',
            'title' => 'عنوان',
            'language' => 'زبان',
        ];
    }

}
