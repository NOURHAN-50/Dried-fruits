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
            $product = Product::with('category', 'images', 'variations')->findOrFail($id);
            $categories = Category::all();
            return view('admin.products.edit', compact('product', 'categories'));
            // Show form to edit a product
        }
        public function show($id)
        {
            $product = Product::with('category',)->findOrFail($id);
            return view('admin.products.show', compact('product'));
            // Show a single product
        }
public function generateUniqueSlug($name, $ignoreId = null)
{
    $slug = Str::slug($name);
    $original = $slug;
    $count = 1;

    while (
        Product::where('slug', $slug)
            ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
            ->exists()
    ) {
        $slug = $original . '-' . $count++;
    }

    return $slug;
}

public function store(StoreProductRequest $request)
{

    $data = $request->validated();
$data['slug'] = $this->generateUniqueSlug($request->name);
$product = Product::create($data);
      // حفظ الـ variations
    if ($request->has('weight')){

foreach ($request->weight as $key => $weight) {

   if (empty($weight)) continue; // 🚀 مهم جدًا

    Variation::create([
        'product_id' => $product->id,
        'weight' => $weight,
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
$data['slug'] = $this->generateUniqueSlug($request->name, $id);
    $product = Product::findOrFail($id);
  // 1. تحديث البيانات
    $product->update($data);

    // 2. إضافة صور جديدة
    if ($request->hasFile('images')) {
           // حذف الصورة القديمة إذا موجودة
        if ($product->images()->exists()) {
            $product->images()->delete();
        }

        foreach ($request->file('images') as $image) {

            $imageName = MediaHandler::upload($image, 'products');

            $product->images()->create([
                'path' => $imageName
            ]);
        }}

            return redirect()->route('admin.products.index')
                     ->with('success', 'تم تعديل المنتج بنجاح ✅');
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
