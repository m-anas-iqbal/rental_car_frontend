<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    public function carOrders()
    {
        return $this->hasMany(\App\Models\car_order::class,'car_id','id');
    }

}
