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

    $reviews = Review::with('customer')->latest()->take(6)->get();

    $sliders = Slider::with('images')->where('is_active', true)->get();

    $banners = Banner::with('images')->where('is_active', true)
        ->where(function($q) {
            $q->whereNull('start_date')->orWhere('start_date', '<=', now());
        })
        ->where(function($q) {
            $q->whereNull('end_date')->orWhere('end_date', '>=', now());
        })->get();

    return view('front.home.index', compact('categories',  'newProducts','reviews', 'sliders', 'banners'));
}

}
