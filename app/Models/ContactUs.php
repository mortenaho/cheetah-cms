<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class ContactUs extends Model
{
    //
    protected $table="contact_us";
    protected $fillable = [
        'id',
        'email',
        'subject',
        'mobile',
        'message',
        'parent',
        'ip',
        'full_name',
        'created_at',
        'updated_at',
        'is_show',
        'language',
        'status',
    ];
    public function getFillable()
    {
        return $this->fillable;
    }
//    public function getIdAttribute()
//    {
//        return Crypt::encrypt($this->attributes['id']);
//    }
}
