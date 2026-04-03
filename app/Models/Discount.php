<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Discount extends Model
{
    protected $fillable = [
        'name',
        'code',
        'type',
        'value',
        'description',
        'min_order_amount',
        'starts_at',
        'target_type',
        'target_id',
        'expires_at',
        'usage_limit',
        'active',
        'times_used'

    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }


    //
}
