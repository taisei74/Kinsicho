<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'path',
        ];
    public function picture_shops()
    {
        return $this->belongsToMany('App\Shop');
    }
}
