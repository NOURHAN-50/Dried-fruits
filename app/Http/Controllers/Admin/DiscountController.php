<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Models\Discount;
use App\Models\Product;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
          $products = Product::all();
        return view('admin.discounts.index', compact('discounts', 'products'));
        // List discounts
    }
    public function create()
    {
        return view('admin.discounts.create');
        // Show form to create a discount
    }
    public function store(StoreDiscountRequest $request)
    {

            $data = $request->validated();
            $data['active'] = $request->has('active');
            Discount::create($data);
            return redirect()->route('admin.discounts.index')->with('success', 'تم إنشاء كود الخصم بنجاح!');

        // Handle discount creation
    }
    public function show($id)
    {
        $discount = Discount::findOrFail($id);
        return view('admin.discounts.show', compact('discount'));
        // Show a single discount    }

    }
    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        return view('admin.discounts.edit', compact('discount'));
        // Show form to edit a discount
    }
    public function update(UpdateDiscountRequest $request, $id)
    {
        $discount = Discount::findOrFail($id);
        $data = $request->validated();
        $data['active'] = $request->has('active');
        $discount->update($data);
        return redirect()->route('admin.discounts.index')->with('success', 'تم تحديث كود الخصم بنجاح!');

        // Handle discount update
    }
    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();
        return redirect()->route('admin.discounts.index')->with('success', 'تم حذف كود الخصم بنجاح!');
        // Delete a discount
    }
    //
}
