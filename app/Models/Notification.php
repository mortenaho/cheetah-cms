<?php
/**
 * Created by PhpStorm.
 * User: mortenaho
 * Date: 7/27/2019
 * Time: 12:49 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table="notification";
    public $timestamps = false;
    protected $fillable = [
        "id",
        "title",
        "message",
        "reg_date",
        "time",
        "type",
        "thumb",
        "link",
        "status",
    ];
    public function setRegDate()
    {
        $this->attributes['reg_date'] = jdate("Y/m/d");
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->reg_date =  jdate("Y/m/d");
        });
    }
}
