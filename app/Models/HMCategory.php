<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;
use phpDocumentor\Reflection\Types\This;
use test\Mockery\ReturnTypeObjectTypeHint;

class HMCategory extends Model
{
    //
    protected $table = "hm_category";
    public $timestamps = false;
    protected $fillable = [
        'id',
        'subject_id',
        'name',
        'url_name',
        'data_name',
        'photo',
        'has_sub',
        'sub_count',
        'has_header',
        'description',
        'is_custom',
        'category_type',
        'telegram_token',
        'telegram_id',
        'telegram_link',
        'post_count',
        'visit_count',
        'update_date',
        'ordering',
        'status'
    ];

    public static function CategoryAndSub()
    {
        return self::with("sub_categories")->orderBy("id","desc")
            ->get();
    }

    public function FeaturePosts()
    {
        return $this->orderBy("id","desc")->with('lastPostTop')->get();
    }

    public function sub_categories()
    {
        return $this->hasMany('\App\Models\HMSubCategory', "category_id")->orderBy('id', 'DESC');
    }

    public function posts()
    {
        return $this->hasMany('\App\Models\HMPost', "category_id");
    }

    public function postCount()
    {
        return $this->posts()->count();
    }

    public function lastPostTop()
    {
        return $this->posts()->orderBy('id', 'DESC')->limit(10);
    }
}
