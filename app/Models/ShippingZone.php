<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingZone extends Model
{
        protected $fillable = ['name', 'price', 'is_cod_available'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
}
