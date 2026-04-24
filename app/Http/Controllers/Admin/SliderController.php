<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSliderRequest;
use App\Models\Slider;
use App\Models\Banner;
use App\Http\Traits\MediaHandler;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::with('images')->get();
        $banners = Banner::with('images')->get();
        return view('admin.sliders.index', compact('sliders','banners'));
        // List discounts
    }
    public function store(StoreSliderRequest $request)
    {

            $data = $request->validated();
            $data['is_active'] = $request->boolean('is_active');
            $slider= Slider::create($data);


            if ($request->hasFile('image')) {

                $imageName = MediaHandler::upload($request->image, 'sliders');

                $slider->images()->create([
                    'path' => $imageName
                ]);
            }
            dd($request->all());
            return redirect()->route('admin.sliders.index')->with('success', 'تم إضافة السلايدر بنجاح!');

    }
    public function edit($id)
{
    $slider = Slider::with('images')->findOrFail($id);
    return view('admin.sliders.edit', compact('slider'));
}
public function update(Request $request, $id)
{
    $slider = Slider::findOrFail($id);

    $data = $request->validate([
        'title' => 'nullable|string|max:255',
        'link' => 'nullable|string',
        'image' => 'nullable|image|max:2048'
    ]);

    $data['is_active'] = $request->boolean('is_active');

    $slider->update($data);

    if ($request->hasFile('image')) {
        $imageName = MediaHandler::upload($request->image, 'sliders');

        $slider->images()->create([
            'path' => $imageName
        ]);
    }

    return redirect()->route('admin.sliders.index')
        ->with('success', 'تم التعديل بنجاح');
}
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'تم حذف السلايدر بنجاح!');
    }
    //
}
