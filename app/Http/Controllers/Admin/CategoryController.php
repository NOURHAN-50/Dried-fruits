<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Traits\MediaHandler;

use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with( 'parent', 'products','images')->get();
        return view('admin.categories.index', compact('categories'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $category = Category::create($data);
        $imageName = MediaHandler::upload($request->image, 'categories');

        $category->images()->create([
            'path' => $imageName
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }
    public function edit(Category $category)
    {
        $categories = Category::where('id', '!=', $category->id)->get();
        return view('admin.categories.edit', compact('category', 'categories'));
    }
    public function update(CategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
          $category->update($validated);


    if ($request->hasFile('image')) {
        if ($category->images()->exists()) {
            $category->images()->delete();
        }

        $imageName = MediaHandler::upload($request->image, 'categories');

        $category->images()->create([
            'path' => $imageName
        ]);
    }





        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
    //
}
