<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'plan_name',
        'plan_body',
        ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function plan_shops()
    {
        return $this->belongsToMany('App\Shop');
    }
    
    public function plan_likes()
    {
        return $this->hasMany('App\Plan_Like');
    }
}
