<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\MediaHandler;
use App\Models\Banner;

class BannerController extends Controller
{
        public function store(StoreSliderRequest $request)
    {

            $data = $request->validated();
            $data['is_active'] = $request->has('is_active');
            $banner= Banner::create($data);

            if ($request->hasFile('image')) {

                $imageName = MediaHandler::upload($request->image, 'banners');

                $banner->images()->create([
                    'path' => $imageName
                ]);
            }
            return redirect()->route('admin.sliders.index')->with('success', 'تم إضافة السلايدر بنجاح!');

        // Handle discount creation
    }
}
