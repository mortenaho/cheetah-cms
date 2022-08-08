<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Social extends Model
{
    protected $table = "social";
    protected $fillable = [
        'id',
        'title',
        'description',
        'link',
        'icon',
        'status',
        'created_at',
        'updated_at'
    ];


}
