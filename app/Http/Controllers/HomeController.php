<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;

class HomeController extends Controller
{
 public function index() {

    // هات كل الكاتيجوريز
      $categories = Category::with('images')->orderBy('created_at', 'desc')->take(4)->get();
      
    // آخر 4 منتجات
    $newProducts = Product::with('images','reviews')->orderBy('created_at', 'desc')->take(4)->get();
    $reviews= Review::all();

    return view('front.home.index', compact('categories',  'newProducts','reviews'));
}

}
