<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Plan_Like extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['shop_id', 'user_id'];
    
    public function plan_user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function plan_shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
