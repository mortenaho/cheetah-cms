<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 3/18/2019
 * Time: 1:01 AM
 */
define("CustomMessagesValidation",
    [
        'required' => ' :attribute را خالی وارد ننمایید.',
        'same' => ':attribute و :other باید مطابقت داشته باشد',
        'size' => ' :attribute باید دقیقا :size باشد.',
        'between' => ' :attribute باید بین :min - :max. باشد',
        'in' => ' :attribute باید یکی از موارد زیر باشد   :values ',
        'min' => 'حداقل طول کاراکتر برای  :attribute  :min  تا میباشد ',
        'max' => 'حداکثر طول کاراکتر برای  :attribute  :max  تا میباشد ',
        'url' => ':attribute نامعتبر می باشد',
        'mimes' => 'نوع فایل معتبر نمی باشد',
        'confirmed'=>'کلمه عبور و تکرار کلمه عبور باهم یکسان نیستند',
        'exists'=>':attribute با این مشخصات وجود ندارد',
        'email'=>'ایمیل وارد شده معتبر نمیباشد'
    ]);
