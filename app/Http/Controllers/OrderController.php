<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Order;

class OrderController extends Controller
{
        public function myOrders()
    {
        $orders = auth()->user()
            ->orders()
            ->with('items.product.images')
            ->latest()
            ->get();
            $activeCount = $orders->whereIn('status', ['processing','shipped','pending'])->count();

$completedCount = $orders->where('status','delivered')->count();



        return view('front.orders.index', compact('orders','activeCount','completedCount'));
    }

    public function success($id)
{
    $order =Order::findOrFail($id);

    return view('front.orders.success', compact('order'));
}

    //
}
