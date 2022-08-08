<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HMSubCategory extends Model
{
    //
    protected $table="hm_sub_category";
    public $timestamps=false;
    protected $fillable=[
        'id',
        'subject_id',
        'category_id',
        'name',
        'url_name',
        'photo',
        'has_header',
        'description',
        'ordering',
        'status'
    ];
    public function category()
    {
        return $this->belongsTo('\App\Models\HMCategory');
    }
    public function posts()
    {
        return $this->hasMany('\App\Models\HMPost','sub_category_id');
    }
}
