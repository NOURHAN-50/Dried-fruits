<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\MediaHandler;
use App\Models\Banner;

class BannerController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
            'link' => 'nullable|url|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'image' => 'nullable|image|max:2048'
        ]);

        $data['is_active'] = $request->has('is_active');
        $banner = Banner::create($data);

        if ($request->hasFile('image')) {
            $imageName = MediaHandler::upload($request->image, 'banners');
            $banner->images()->create([
                'path' => $imageName
            ]);
        }
        return redirect()->route('admin.sliders.index')->with('success', 'تم إضافة البنر بنجاح!');
    }
    public function edit($id)
{
    $banner = Banner::findOrFail($id);
    return view('admin.sliders.edit', compact('banner'));
}

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'تم حذف البنر بنجاح!');
    }
}
