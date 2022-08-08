<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table="category";

    protected $fillable = [
        'id',
        'title',
        'type',
        'parent',
        'has_child',
        'url_slug',
        'icon',
        'created_at',
        'updated_at',
        'language',
        'ordering',
        'description',
        'status',
    ];
    public function getFillable()
    {
        return $this->fillable;
    }

    public function posts()
    {
        return $this->hasMany(Post::class,"category_id");
    }

}
