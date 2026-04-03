<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected static function boot()
{
    parent::boot();

    static::creating(function ($category) {
        $category->slug = Str::slug($category->name);
    });
}
    protected $fillable = ['name', 'slug', 'parent_id'];
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    //
}
