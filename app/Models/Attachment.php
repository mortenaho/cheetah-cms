<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    //
    protected $table="attachment";

    protected $fillable = [
        'id',
        'type',
        'type_id',
        'mime_type',
        'file',
        'link_address',
        'title',
        'created_at',
        'updated_at',
        'ordering',
        'status',
    ];
    public function getFillable()
    {
        return $this->fillable;
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
