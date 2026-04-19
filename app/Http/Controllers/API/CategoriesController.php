<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Http\Traits\MediaHandler;
use Illuminate\Support\Str;


class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::with('parent','products','images')
            ->whereNull('parent_id')
            ->get();

        return response()->json($categories);
    }
//     public function show($id)
// {
//     $category = Category::with('products.images')->findOrFail($id);

//     return response()->json($category);
// }


    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $data['image'] = MediaHandler::upload($request->file('image'),'categories');
        }

        $category = Category::create($data);

        return response()->json([
            'success' => 'Category created successfully',
            'category' => $category
        ],201);
    }


    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {

            $data['image'] = MediaHandler::updateMedia(
                $request->file('image'),
                'categories',
                $category->image
            );

        }

        $category->update($data);

        return response()->json([
            'message' => 'Category updated successfully'
        ]);
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully'
        ]);
    }
}
