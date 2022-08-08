<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    //
    protected $table = "post_meta";
    public $timestamps = false;
    protected $fillable = [
        'id',
        'post_id',
        'meta_key',
        'meta_value'
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
