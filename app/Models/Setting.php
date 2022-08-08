<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $table="setting";
    public $timestamps = false;
    protected $fillable = [
        'id',
        'subject_id',
        'title',
        'header_logo',
        'footer_logo',
        'footer_banner',
        'header_banner',
        'footer_color',
        'header_color',
        'search_box',
        'about',
        'contact_info',
        'keywords',
        'description',
        'favicon',
        'socials',
        'email',
        'site_name',
        'google_analytics',
        'alexa_link',
        'gatracking_id'
    ];


}
