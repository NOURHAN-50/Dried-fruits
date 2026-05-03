<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Variation;
use App\Models\ShippingZone;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
            $subtotal = 0;


    foreach ($cart as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }
    $zones = ShippingZone::all();
        return view('front.cart.index', compact('cart', 'subtotal','zones'));
    }

public function add(Request $request, $id)
{
    $product = Product::with('images', 'variations')->findOrFail($id);

    $variation = null;

    if ($request->variation_id) {
        $variation = Variation::findOrFail($request->variation_id);
$stock = $variation?->stock ?? $product->stock;
        if ($stock <= 0) {
            return response()->json([
                'status' => false,
                'message' => 'Out of stock'
            ], 400);
        }
    }

    if (!$request->variation_id && $product->variations->count() > 0) {
        return response()->json([
            'status' => false,
            'message' => 'يجب اختيار المقاس'
        ], 400);
    }

    $data = $product->getFinalData($request->variation_id);
    $price = $data['price'];
$discount = $product->discounts->where('active', 1)->first();

if ($discount) {
    if ($discount->type == 'percentage') {
        $price -= ($price * $discount->value / 100);
    } else {
        $price -= $discount->value;
    }
}

    $key = $product->id . '-' . ($variation->id ?? 0);

    $cart = session()->get('cart', []);

    if (isset($cart[$key])) {
        $cart[$key]['quantity'] += 1;
    } else {
        $cart[$key] = [
            'product_id' => $product->id,
            'variation_id' => $variation?->id,
            'name' => $product->name,
            'price' => $price,
            'stock' => $data['stock'],
            'image' => $data['images'][0] ?? optional($product->images->first())->path,
            'quantity' => 1,
            'cost' => $variation->cost ?? $product->cost,
        ];
    }

    session()->put('cart', $cart);

    return response()->json([
        'status' => true,
        'cart_count' => array_sum(array_column($cart, 'quantity'))
    ]);
}
public function update(Request $request)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$request->id])) {
        $cart[$request->id]['quantity'] = $request->quantity;
        session()->put('cart', $cart);
    }

    $subtotal = 0;

    foreach ($cart as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }

    $shipping = 0;
    $discount = 0;


$total = $subtotal;

    return response()->json([
        'subtotal' => $subtotal,
        'total' => $total,
        'cart_count' => array_sum(array_column($cart, 'quantity'))
    ]);
}

    // حذف منتج
    public function remove($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back();
    }

    // تفريغ الكارت
    public function clear()
    {
        session()->forget('cart');
        return back();
    }
}
