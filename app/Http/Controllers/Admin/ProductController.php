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
        }
        public function create()
        {
            $categories = Category::all();
            return view('admin.products.create', compact('categories'));
        }

        public function edit($id)
        {
            $product = Product::with('category', 'images', 'variations')->findOrFail($id);
            $categories = Category::all();
            return view('admin.products.edit', compact('product', 'categories'));
        }
        public function show($id)
        {
            $product = Product::with('category',)->findOrFail($id);
            return view('admin.products.show', compact('product'));
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




    if ($request->hasFile('main_image')) {

        $mainImage = MediaHandler::upload($request->main_image, 'products');

        $product->images()->create([
            'path' => $mainImage,
            'is_main' => true
        ]);
    }

    if ($request->hasFile('product_images')) {

        foreach ($request->file('product_images') as $image) {

            $imageName = MediaHandler::upload($image, 'products');

            $product->images()->create([
                'path' => $imageName,
                'is_main' => false
            ]);
        }
    }

    if ($request->has('weight')) {

        foreach ($request->weight as $key => $weight) {

            if (empty($weight)) continue;

            $variation = Variation::create([
                'product_id' => $product->id,
                'weight' => $weight,
                'price_override' => $request->price_override[$key] ?? null,
                'stock' => $request->stock[$key] ?? 0,
            ]);

            if ($request->hasFile('images') && isset($request->file('images')[$key])) {

                $image = $request->file('images')[$key];
                $imageName = MediaHandler::upload($image, 'products');

                $variation->images()->create([
                    'path' => $imageName
                ]);
            }
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
    $product->update($data);

if ($request->hasFile('main_image')) {

    $oldMain = $product->images()->where('is_main', 1)->first();

    if ($oldMain) {
        \Storage::delete('products/' . $oldMain->path);
        $oldMain->delete();
    }

    $mainImage = MediaHandler::upload($request->main_image, 'products');

    $product->images()->create([
        'path' => $mainImage,
        'is_main' => 1
    ]);
}


  if ($request->hasFile('product_images')) {

    foreach ($request->file('product_images') as $image) {

        $imageName = MediaHandler::upload($image, 'products');

        $product->images()->create([
            'path' => $imageName,
            'is_main' => 0
        ]);
    }
}


if ($request->has('weight')) {

    foreach ($request->weight as $key => $weight) {

        if (empty($weight)) continue;

        $variation = Variation::updateOrCreate(
            [
                'id' => $request->variation_id[$key] ?? null
            ],
            [
                'product_id' => $product->id,
                'weight' => $weight,
                'price_override' => $request->price_override[$key] ?? null,
                'stock' => $request->stock[$key] ?? 0,
            ]
        );

        if ($request->hasFile('images') && isset($request->file('images')[$key])) {

            $image = $request->file('images')[$key];
            $imageName = MediaHandler::upload($image, 'products');

               foreach ($variation->images as $oldImage) {
        \Storage::disk('public')->delete('products/' . $oldImage->path);
        $oldImage->delete();
    }
            $variation->images()->create([
                'path' => $imageName
            ]);
        }
    }
}


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
        }
    //
}
