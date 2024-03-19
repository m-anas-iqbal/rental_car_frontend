<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cancelation_request extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function get_cars()
    {
        return $this->belongsTo(Cars::class, "car_id");
    }

    use HasFactory;
}
