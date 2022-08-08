<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class User extends Authenticatable
{
    use Notifiable;
    protected $table="user";
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'username',
        'password',
        'mobile',
        'avatar',
        'is_active',
        'code',
        'email',
        'password',
        'status'
    ];

    public $profile=[
        'first_name',
        'last_name',
        'mobile',
        'avatar',
        'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
       return $this->first_name ." ". $this->last_name;
    }
    public function getProfileAttribute()
    {
        return $this->profile();
    }
    public function getIdAttribute()
    {
        return $this->attributes['id'];
    }
}
