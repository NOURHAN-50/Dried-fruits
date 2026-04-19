<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\ShippingZone;

class ShippingZoneController extends Controller
{
     public function index()
    {
        $zones = ShippingZone::all();
        return view('admin.ShippingZone.index', compact('zones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        ShippingZone::create($request->all());
        return back();
    }

    public function update(Request $request, ShippingZone $zone)
    {
        $zone->update($request->all());
        return back();
    }

    public function destroy(ShippingZone $zone)
    {
        $zone->delete();
        return back();
    }
    //
}
