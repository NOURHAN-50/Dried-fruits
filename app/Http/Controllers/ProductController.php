<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
public function shop(Request $request)
{
    $query = Product::with('images', 'reviews', 'category');

    // 🔍 Search
    if ($request->search) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // 🏷️ Filter by category
    if ($request->category) {
        $query->where('category_id', $request->category);
    }

    // 📦 Filter by size (مثال)
    if ($request->size) {
        $query->where('size', $request->size);
    }

    $products = $query->latest()->paginate(6);
    $categories = Category::all();

    return view('front.products.shop', compact('products', 'categories'));
}
    public function show($product)
{
    $product = Product::with(['images', 'category','variations'])->findOrFail($product);
    return view('front.products.show', compact('product'));
}

public function stock($id){
    $product = Product::findOrFail($id);
    return response()->json(['quantity' => $product->quantity]);
}

    //
}
