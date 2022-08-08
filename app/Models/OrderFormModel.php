<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderFormModel extends Model
{
    protected $table="order_form";


    public function order_meta()
    {
        return $this->hasMany(OrderFormMetaModel::class, "order_id");
    }
}
