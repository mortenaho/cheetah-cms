<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HMLinks extends Model
{
    //
    protected $table="hm_links";
    public $timestamps = false;
    protected $fillable = [
        'title',
        'photo',
        'link',
        'visit_status',
        'status'
    ];
}
