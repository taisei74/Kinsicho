<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
                'name',
                'money',
                'body',
        ];
        
    // public function getPaginateByLimit(int $limit_count = 5)
    // {
    //     return $this->orderBy('money', 'desc')->paginate(5);
    // }
}
