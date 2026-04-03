<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Product;
use App\Models\User;
use App\Models\Payment;
use App\Models\OrderItem;


class Order extends Model
{
    protected $fillable = ['customer_name','phone', 'total_price', 'status', 'address', 'discount_total','notes'];
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'price');
    }
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

}
