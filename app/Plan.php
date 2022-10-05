<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'plan_name',
        ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function plan_shops()
    {
        return $this->belongsToMany('App\Shop');
    }
}
