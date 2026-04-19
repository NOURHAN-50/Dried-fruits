<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($id)
{

$category = Category::with('products.images')->findOrFail($id);

    return view('front.categories.show', compact('category'));
}
    //
}
