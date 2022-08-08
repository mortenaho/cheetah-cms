<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    //
    protected $table = "keyword";
    public $timestamps = false;
    protected $fillable = [
        'id',
        'content'
    ];

    public function getFillable()
    {
        return $this->fillable;
    }


}
