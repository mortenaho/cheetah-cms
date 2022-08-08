<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Comment extends Model
{
    //
    protected $table = "comments";
    protected $fillable = [
        'id',
        'user_id',
        'parent',
        'post_id',
        'post_type',
        'author_ip',
        'email',
        'full_name',
        'content',
        'created_at',
        'updated_at',
        'is_show',
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

    public function comments()
    {
        return $this->hasMany($this, "parent");
    }
}
