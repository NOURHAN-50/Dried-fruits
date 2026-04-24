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
             'main_stock',
            'status',
            'cost_price',
             ];
    public function category(){
        return $this->belongsTo(Category::class);

    }
    public function variations()
    {
        return $this->hasMany(Variation::class);
    }
    public function discounts()
{
    return $this->hasMany(Discount::class, 'target_id')
        ->where('target_type', 'product');
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
        public function mainImage()
    {
        return $this->morphOne(Image::class, 'imageable')
            ->where('is_main', true);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function averageRating()
{
    return $this->reviews()->avg('rating');
}
public function getFinalData($variationId = null)
{
    $variation = null;

    if ($variationId) {
        $variation = $this->variations->where('id', $variationId)->first();
    }

    return [
        'price' => $variation->price_override ?? $this->price,
        'stock' => $variation->stock ?? $this->stock,
        'image' => ($variation && $variation->images->count()) ? $variation->images->first()->path : optional($this->images->first())->path,
        'variation_id' => $variation?->id,
    ];
}
    public function isInStock()
    {
    if ($this->variations()->count() > 0) {
        return $this->variations()->where('stock', '>', 0)->exists();
    }

    return $this->main_stock > 0;
    }
}
