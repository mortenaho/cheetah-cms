<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{

    protected $table="visits";

    protected $fillable = [
        'id',
        'post_type',
        'category_id',
        'post_id',
        'year_month',
        'user_ip',
        'browser_name',
        'browser_version',
        'device_type',
        'device_name',
        'visit_type',
        'visitor_session_time',
        'status'
    ];


    public function getFillable()
    {
        return $this->fillable;
    }

}
