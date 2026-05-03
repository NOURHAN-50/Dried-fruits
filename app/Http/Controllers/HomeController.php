<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Banner;

class HomeController extends Controller
{
 public function index() {

    $categories = Category::with('images')->orderBy('created_at', 'desc')->take(4)->get();

    $newProducts = Product::with('images','reviews')->orderBy('created_at', 'desc')->take(4)->get();
    $latestProducts = Product::latest()->take(8)->get();
$bestSellingProducts = Product::withCount('orderItems')
    ->orderBy('order_items_count', 'desc')
    ->take(8)
    ->get();
    $reviews = Review::with('customer')->latest()->take(6)->get();

    $sliders = Slider::with('images')->where('is_active', true)->get();

    $banners = Banner::with('images')->where('is_active', true)
        ->where(function($q) {
            $q->whereNull('start_date')->orWhere('start_date', '<=', now());
        })
        ->where(function($q) {
            $q->whereNull('end_date')->orWhere('end_date', '>=', now());
        })->get();

    return view('front.home.index', compact('latestProducts','categories',  'newProducts','reviews', 'sliders', 'banners','bestSellingProducts'));
}
public function offers()
{
    $offers = Product::with(['images', 'discounts'])
        ->whereHas('discounts', function ($q) {
            $q->where('active', 1);
        })
        ->latest()
        ->get();

    return view('front.home.offers', compact('offers'));
}

}
