<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Order;
class OrderController extends Controller
{
        public function myOrders()
    {
 if (auth()->check()) {
    $orders = auth()->user()->orders()->latest()->get();
} else {
    $orders = collect(); 
}

        $orders = auth()->user()
            ->orders()
            ->with('items.product.images')
            ->latest()
            ->get();
            $activeCount = $orders->whereIn('status', ['processing','shipped','pending'])->count();
            $completedCount = $orders->where('status','delivered')->count();
        return view('front.orders.index', compact('orders','activeCount','completedCount'));
    }
        public function confirmInstapay(Request $request, $orderId)
        {
    $order = Order::findOrFail($orderId);
    $order->update([
        'status' => 'waiting_confirmation'
    ]);
    return redirect('/')->with('success', 'Payment submitted successfully. We will confirm it soon.');
}
    public function success($id)
{
    $order =Order::findOrFail($id);
    return view('front.orders.success', compact('order'));
}
}
