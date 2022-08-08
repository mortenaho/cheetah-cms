<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuTempRequest extends FormRequest
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
            'parent' => 'required',
            'type' => 'required',
            'title' => 'required',
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
            'parent' => 'دسته بندی',
            'type' => 'نوع دسته بندی',
            'title' => 'عنوان',
            'language' => 'زبان',
        ];
    }

}
