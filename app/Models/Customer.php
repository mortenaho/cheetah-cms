<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Customer extends Model
{

    protected $table="customers";

    protected $fillable = [
        'id',
        'user_id',
        'address',
        'username',
        'postal_code',
        'province',
        'city',
        'phone'
    ];

    public function getFillable()
    {
        return $this->fillable;
    }

}
