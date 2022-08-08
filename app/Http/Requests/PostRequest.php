<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'category_id' => 'required',
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
            'category_id' => 'دسته بندی',
            'content' => 'محتوا',
            'title' => 'عنوان',
            'language' => 'زبان',
        ];
    }

}
