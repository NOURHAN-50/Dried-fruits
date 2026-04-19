<?php

namespace App\Http\Controllers\API;

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
        return  response()->json(['discounts'=>$discounts , 'products'=>$products]);
        // List discounts
    }
   public function store(StoreDiscountRequest $request)
    {
        $data = $request->validated();
        $data['active'] = $request->has('active');

        $discount = Discount::create($data);

        return response()->json([
            'message' => 'تم إنشاء كود الخصم بنجاح!',
            'discount' => $discount
        ], 201);
    }

    // عرض خصم محدد
    public function show($id)
    {
        $discount = Discount::findOrFail($id);

        return response()->json($discount);
    }

    // تعديل خصم محدد
    public function update(UpdateDiscountRequest $request, $id)
    {
        $discount = Discount::findOrFail($id);

        $data = $request->validated();
        $data['active'] = $request->has('active');

        $discount->update($data);

        return response()->json([
            'message' => 'تم تحديث كود الخصم بنجاح!',
            'discount' => $discount
        ], 201);
    }

    // حذف خصم
    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();

        return response()->json([
            'message' => 'تم حذف كود الخصم بنجاح!'
        ], 201);
    }
}
