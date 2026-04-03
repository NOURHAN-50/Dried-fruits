<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
        use App\Models\Category;
        use App\Models\Variation;
        use App\Models\Order;
        use App\Models\OrderItem;
        use App\Models\Image;


class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
         'description',
          'price',
           'sale_price',
            'category_id',
             'stock',
            'status',

             ];
    public function category(){
        return $this->belongsTo(Category::class);

    }
    public function variations()
    {
        return $this->hasMany(Variation::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')->withPivot('quantity', 'price');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function getImageUrlAttribute()
{
    if ($this->images->first()) {
        return asset('storage/'.$this->images->first()->path);
    }

    return asset('assets/products/p1.jpg');
}
    //
}
