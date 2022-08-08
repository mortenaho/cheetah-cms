<?php

namespace App\Models;

use function foo\func;
use Illuminate\Database\Eloquent\Model;
use test\Mockery\ReturnTypeObjectTypeHint;

class Post extends Model
{
    //
    protected $table = "post";

    protected $fillable = [
        'id',
        'uid',
        'user_id',
        'title',
        'post_type',
        'parent',
        'excerpt',
        'content',
        'category_id',
        'password',
        'has_comment',
        'comment_count',
        'is_login',
        'link_address',
        'slug',
        'author',
        'thumb',
        'keywords',
        'status',
        'ordering',
        'language',
        'featured',
        'reg_date',
        'created_at',
        'updated_at'
    ];

    public function setRegDate()
    {
        $this->attributes['reg_date'] = jdate("Y/m/d");
    }


//    protected $casts = [
//        'created_at' => 'datetime:Y-m-d',
//        'updated_at' => 'datetime:Y-m-d',
//    ];

    public function getFillable()
    {
        return $this->fillable;
    }

    public function post_meta()
    {
        return $this->hasMany(PostMeta::class, "post_id");
    }

    public function comments()
    {
       return $this->hasMany(Comment::class, "post_id");
    }
    public function attachments()
    {
        return $this->hasMany(Attachment::class, "type_id");
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

//    protected static function boot()
//    {
//        parent::boot();
//
//        static::creating(function ($query) {
//            $query->reg_date =  jdate("Y/m/d");
//            $query->user_id = auth()->id();
//            $query->author = auth()->user()->full_name;
//            $query->uid = uniqid();
//        });
//        static::updating(function ($query) {
//            $query->reg_date =  jdate("Y/m/d");
//            $query->user_id = auth()->id();
//            $query->author = auth()->user()->full_name;
//        });
//    }

}
