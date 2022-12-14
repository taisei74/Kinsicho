<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
                'name',
                'money',
                'body',
                'address',
        ];
        
    // public function getPaginateByLimit(int $limit_count = 5)
    // {
    //     return $this->orderBy('money', 'desc')->paginate(5);
    // }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }
    
    public function plans()
    {
        return $this->belongsToMany('App\Plan');
    }
    
    public function pictures()
    {
        return $this->belongsToMany('App\Picture');
    }
}
