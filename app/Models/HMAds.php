<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class HMAds extends Model
{
    //
    protected $table="hm_ads";
    public $timestamps = false;
    protected $fillable = [
        'id',
        'title',
        'description',
        'keywords',
        'photo_address',
        'link_address',
        'ordering',
        'status'
    ];
    public function getIdAttribute()
    {
        return Crypt::encrypt($this->attributes['id']);
    }
}
