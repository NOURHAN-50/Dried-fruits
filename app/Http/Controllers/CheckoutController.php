<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceOrderRequest;
use Illuminate\Support\Facades\DB;
use App\Models\ShippingZone;
use App\Models\Order;
use App\Models\Product;

use App\Models\Variation;
use App\Models\Discount;
use Illuminate\Http\Request;
class CheckoutController extends Controller
{
public function index()
{
    $cart = session()->get('cart', []);
    $subtotal = 0;

    foreach ($cart as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }

    $zones = ShippingZone::all();

    return view('front.checkout.index', compact('zones', 'subtotal'));
}

public function applyDiscount(Request $request)
{
    $code = $request->code;
    $subtotal = $request->subtotal;

    if (!$code) {
        return response()->json(['success' => false, 'message' => 'يرجى إدخال كود الخصم']);
    }

    $discount = Discount::where('code', $code)->first();

    if (!$discount) {
        return response()->json(['success' => false, 'message' => 'كود الخصم غير صحيح']);
    }

    if (!$discount->active) {
        return response()->json(['success' => false, 'message' => 'كود الخصم غير فعال']);
    }

    if ($discount->starts_at && $discount->starts_at > now()) {
        return response()->json(['success' => false, 'message' => 'كود الخصم غير فعال بعد']);
    }

    if ($discount->expires_at && $discount->expires_at < now()) {
        return response()->json(['success' => false, 'message' => 'كود الخصم منتهي الصلاحية']);
    }

    if ($discount->usage_limit && $discount->times_used >= $discount->usage_limit) {
        return response()->json(['success' => false, 'message' => 'تم تجاوز الحد الأقصى لاستخدام الكود']);
    }

    if ($discount->min_order_amount && $subtotal < $discount->min_order_amount) {
        return response()->json(['success' => false, 'message' => 'الحد الأدنى للطلب غير مستوفى']);
    }

    $discountAmount = 0;
    if ($discount->type === 'percentage') {
        $discountAmount = ($subtotal * $discount->value) / 100;
    } else {
        $discountAmount = $discount->value;
    }

    return response()->json([
        'success' => true,
        'discount_amount' => $discountAmount,
        'message' => 'تم تطبيق الخصم بنجاح'
    ]);
}

public function placeOrder(PlaceOrderRequest $request)
{
    $cart = session()->get('cart', []);

    if (empty($cart)) {
        return back()->with('error', 'الكارت فاضي');
    }

    $zone = ShippingZone::findOrFail($request->shipping_zone_id);

    DB::beginTransaction();

    try {

        $subtotal = 0;
        $cost = 0;

        foreach ($cart as $item) {

            $subtotal += $item['price'] * $item['quantity'];
            $cost += ($item['cost'] ?? 0) * $item['quantity'];


            if ($item['variation_id']) {
                $variation = Variation::find($item['variation_id']);

                if (!$variation) {
                    throw new \Exception("Variation غير موجود");
                }

                if ($variation->stock < $item['quantity']) {
                    throw new \Exception("الكمية غير متوفرة في: {$item['name']}");
                }
            }
        }


        $discountAmount = 0;
        $appliedDiscount = null;
        if ($request->discount_code) {
            $appliedDiscount = Discount::where('code', $request->discount_code)->first();
            if ($appliedDiscount && $appliedDiscount->active) {
                if ($appliedDiscount->type === 'percentage') {
                    $discountAmount = ($subtotal * $appliedDiscount->value) / 100;
                } else {
                    $discountAmount = $appliedDiscount->value;
                }
                $appliedDiscount->increment('times_used');
            }
        }

        $total = $subtotal + $zone->price - $discountAmount;


        $order = Order::create([
            'customer_id' => auth()->id(),
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'shipping_zone_id' => $zone->id,
            'shipping_price' => $zone->price,
            'total_price' => max(0, $total),
            'cost' => $cost,
            'profit' => max(0, $total - $cost),
            'status' => 'pending',
            'discount_total' => $discountAmount,
            'discount_code' => $request->discount_code,
        ]);


        $paymentMethod = $request->payment_method === 'online' ? 'instapay' : 'cash_on_delivery';
        $order->payment()->create([
            'amount' => max(0, $total),
            'payment_method' => $paymentMethod,
            'status' => 'pending',
        ]);


        foreach ($cart as $item) {

            if ($item['variation_id']) {
                $variation = Variation::find($item['variation_id']);

                $variation->decrement('stock', $item['quantity']);
            }

            $order->items()->create([
                'product_id' => $item['product_id'],
                'variation_id' => $item['variation_id'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['price'],
                'cost' => $item['cost'] ?? 0,
            ]);
        }

        DB::commit();

        session()->forget('cart');

return redirect()->route('order.success', $order->id);
   } catch (\Exception $e) {

        DB::rollBack();

        return back()->with('error', $e->getMessage());
    }
}
    //
}
