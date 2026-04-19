<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $fillable = ['product_id', 'price_override', 'stock','weight'];
    public function product()
    {
        return $this->belongsTo(Product::class);

    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')->withPivot('quantity', 'price');
    }
public function images()
{
    return $this->morphMany(Image::class, 'imageable');
}
    //
}
