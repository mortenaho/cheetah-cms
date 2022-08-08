<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class HMPost extends Model
{
    //
    protected $table="hm_post";
    public $timestamps = false;
    protected $fillable = [
        'id',
        'subject_id',
        'category_id',
        'sub_category_id',
        'post_code',
        'title',
        'url_name',
        'photo_address',
        'thumb_address',
        'link_address',
        'post_date',
        'reg_date',
        'robot_status',
        'status',
        'keywords',
        'featured',
        'post_type'
    ];

    public function category()
    {
        return $this->belongsTo('\App\Models\HMCategory');
    }

    public function getIdAttribute()
    {
        return Crypt::encrypt($this->attributes['id']);
    }
    public function scopeEnglish($query)
    {
        return $query->where('language', '=', 'en');
    }

    public function scopeFarsi($query)
    {
        return $query->where('language', '=', 'fa');
    }
}
