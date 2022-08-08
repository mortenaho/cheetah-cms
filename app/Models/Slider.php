<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Slider extends Model
{
    //
    protected $table="slider";
    protected $fillable = [
        'id',
        'title',
        'sub_title',
        'description',
        'link',
        'photo',
        'status',
    ];
    public function getFillable()
    {
        return $this->fillable;
    }

}
