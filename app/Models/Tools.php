<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tools extends Model
{
    //
    protected $table = "tools";

    protected $fillable = [
        'id',
        'name',
        'title',
        'link_address',
        'icon',
        'type',
        'is_active',
        'status'
    ];
    public $timestamps = false;

    public function getFillable()
    {
        return $this->fillable;
    }


}
