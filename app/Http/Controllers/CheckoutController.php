<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceOrderRequest;
use Illuminate\Support\Facades\DB;
use App\Models\ShippingZone;
use App\Models\Order;
use App\Models\Product;

use App\Models\Variation;
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

        // 🔥 1) validation + totals + stock check
        foreach ($cart as $item) {

            $subtotal += $item['price'] * $item['quantity'];
            $cost += ($item['cost'] ?? 0) * $item['quantity'];

            // 🎯 variation check بسيط
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

        $total = $subtotal + $zone->price;

        // 🔥 2) create order
        $order = Order::create([
            'customer_id' => auth()->id(),
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'shipping_zone_id' => $zone->id,
            'shipping_price' => $zone->price,
            'total_price' => $total,
            'cost' => $cost,
            'profit' => $total - $cost,
            'status' => 'pending',
        ]);

        // 🔥 3) create items + decrement stock
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

        return redirect()->route('home')->with('success', 'Order placed successfully');

    } catch (\Exception $e) {

        DB::rollBack();

        return back()->with('error', $e->getMessage());
    }
}
    //
}
