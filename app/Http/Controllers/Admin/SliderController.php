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
            $data['is_active'] = $request->has('is_active');
            $slider= Slider::create($data);

            if ($request->hasFile('image')) {

                $imageName = MediaHandler::upload($request->image, 'sliders');

                $slider->images()->create([
                    'path' => $imageName
                ]);
            }
            return redirect()->route('admin.sliders.index')->with('success', 'تم إضافة السلايدر بنجاح!');

        // Handle discount creation
    }
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'تم حذف كود الخصم بنجاح!');
        // Delete a discount
    }
    //
}
