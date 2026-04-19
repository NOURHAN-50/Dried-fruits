<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer', 'payment', 'items.product')->get();
        return view('admin.orders.index', compact('orders'));
        // List orders
    }
    public function create()
    {
        return view('admin.orders.create');
        // Show form to create an order
    }
    public function show($id) {
    $order = Order::with('items.product','payment')->findOrFail($id);
    return view('admin.orders.partials.order-details', compact('order'));
}
    public function store(Request $request)
    {

        // Handle order creation
    }
    public function edit($id)
    {
        // Show form to edit an order
    }
    public function update(Request $request, $id)
    {
        // Handle order update
    }

    public function updateStatus(Request $request, Order $order)
{
    $request->validate([
        'status' => 'required|in:pending,processing,shipped,completed,cancelled',
    ]);

    $order->update(['status' => $request->status]);

    return response()->json([
        'success' => true,
        'status' => $order->status
    ]);
}
public function filter(Request $request)
{
    $status = $request->status;

    $orders = Order::with('customer', 'payment', 'items.product')
        ->when($status != 'all', function ($q) use ($status) {
            $q->where('status', $status);
        })
        ->latest()
        ->get();

    return view('admin.orders.partial.table', compact('orders'))->render();
}
}
