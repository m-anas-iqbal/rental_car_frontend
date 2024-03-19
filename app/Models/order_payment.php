<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_payment extends Model
{
    use HasFactory;
public function get_users(){
return $this->belongsTo(User::class, 'user_id');
}
}
