<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer', 'payment', 'items.product')->get();
                    return response()->json([
                'succes'=> true,
                'orders'=>$orders
            ]);
        // List orders
    }
    public function show($id) {
    $order = Order::with('items.product','payment')->findOrFail($id);
      return response()->json([
                'order'->$order
            ]); }
    public function store(Request $request)
    {

        // Handle order creation
    }

    public function update(Request $request, $id)
    {
        // Handle order update
    }
      // Delete an order
            public function destroy($id)
        {
            $order = Order::findOrFail($id);

            $order->delete();
          return response()->json(
            [
                 'message' => 'order delet successfully.'
            ],201);
        // Delete a category
        }
}
