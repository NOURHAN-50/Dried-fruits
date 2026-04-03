<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Variation;
use Illuminate\Support\Str;
use App\Http\Traits\MediaHandler;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
        public function index()
        {
            $products = Product::with('category', 'images')->paginate(10);
            return view('admin.products.index', compact('products'));
            // List products
        }
        public function create()
        {
            $categories = Category::all();
            return view('admin.products.create', compact('categories'));
            // Show form to create a product
        }

        public function edit($id)
        {
            $product = Product::with('category')->findOrFail($id);
            $categories = Category::all();
            return view('admin.products.edit', compact('product', 'categories'));
            // Show form to edit a product
        }
        public function show($id)
        {
            $product = Product::with('category')->findOrFail($id);
            return view('admin.products.show', compact('product'));
            // Show a single product
        }

public function store(StoreProductRequest $request)
{

    $data = $request->validated();
    $data['slug'] = Str::slug($request->name); // إضافة الـ slug قبل الحفظ
    $product = Product::create($data);
      // حفظ الـ variations
    if ($request->variation_name) {

        foreach ($request->variation_name as $key => $name) {

            Variation::create([
                'product_id' => $product->id,
                'weight' => $request->weight[$key],
                'price_override' => $request->price_override[$key] ?? null,
                'stock' => $request->stock[$key] ?? 0,
            ]);
        }
    }
    // 2. لو فيه صور
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            // ارفع الصورة
            $imageName = MediaHandler::upload($image, 'products');
            // خزنيها في جدول الصور
            $product->images()->create([
                'path' => $imageName
            ]);
        }
    }
    return redirect()->route('admin.products.index')
                     ->with('success', 'تم إضافة المنتج بنجاح ✅');
}
        public function update(UpdateProductRequest $request, $id)
{
    $data=$request->validated();
    $data['slug'] = Str::slug($request->name); // تحديث الـ slug
    $product = Product::findOrFail($id);
  // 1. تحديث البيانات
    $product->update([
        'name' => $request->name,
        'price' => $request->price,
    ]);

    // 2. إضافة صور جديدة
    if ($request->hasFile('images')) {

        foreach ($request->file('images') as $image) {

            $imageName = MediaHandler::upload($image, 'products');

            $product->images()->create([
                'path' => $imageName
            ]);
        }}
        }

        public function destroy($id)
        {
            $product = Product::findOrFail($id);
            MediaHandler::deleteMedia($product->image);
            $product->delete();
            return redirect()->route('admin.products.index')
            ->with('success', 'تم حذف المنتج بنجاح ✅');
            // Delete a product
        }
    //
}
