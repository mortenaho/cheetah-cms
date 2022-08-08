<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuTemp extends Model
{
    //
    protected $table="menu_temp";

    protected $fillable = [
        'id',
        'title',
        'type',
        'type_id',
        'parent',
        'has_child',
        'url_slug',
        'created_at',
        'updated_at',
        'language',
        'ordering',
        'breadcrumb',
        'link_address',
        'status',
    ];
    public function getFillable()
    {
        return $this->fillable;
    }

}
