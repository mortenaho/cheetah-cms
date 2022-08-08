<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 6/30/2019
 * Time: 6:00 PM
 */

namespace App\Themes\main\Requests;



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
            'email' => 'required|email',
            'full_name' => 'required|min:5',
            'content' => 'required|min:10',
            'g-recaptcha-response' => 'required|captcha'
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
            'content' => 'پیام',
            'g-recaptcha-response' => "من ربات نیستم",

        ];
    }

}
