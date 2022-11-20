<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
    
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    
    public function shops()
    {
        return $this->hasMany('App\Shop');
    }
    
   public function like_shops()
   {
       return $this->belongsToMany(Shop::class, 'likes', 'user_id', 'shop_id');
   }
    
    public function plans()
    {
        return $this->hasMany('App\Plan');
    }
    
    public function plan_likes()
    {
        return $this->hasMany('App\Plan_Like');
    }
    
    public function like_plans()
    {
        return $this->belongsToMany(Plan::class, 'plan__likes', 'user_id', 'plan_id');
    }
}
