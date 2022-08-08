<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersModel extends Model
{
    protected $table="orders";

    protected $fillable = [
        'id',
        'user_id',
        'customer_name',
        'customer_mobile',
        'customer_address',
        'payment_status',
        'table_id',
        'table_name',
        'type_name',
        'register_date',
        'order_form_id',
        'discount',
        'total_price',
        'description',
        'status'
    ];

    public function getFillable()
    {
        return $this->fillable;
    }
}
