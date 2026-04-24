<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class CustomersController extends Controller
{
public function index(Request $request)
{
    $customers = User::where('role', 'customer')
        ->withCount('orders')
        ->withSum('orders', 'total_price');

 if ($request->segment == 'vip') {
    $customers->whereHas('orders', function ($q) {
        $q->selectRaw('customer_id, SUM(total_price) as total_spent')
          ->groupBy('customer_id')
          ->havingRaw('SUM(total_price) > 5000');
    });
}
    if ($request->segment == 'active') {
        $customers->whereHas('orders', function($q){
            $q->where('created_at', '>=', now()->subDays(30));
        });
    }
    if ($request->segment == 'lost') {
        $customers->whereDoesntHave('orders', function($q){
            $q->where('created_at', '>=', now()->subDays(90));
        });
    }

    $customers = $customers->paginate(10);

    $totalCustomers = User::where('role', 'customer')->count();

    $vipCount = User::where('role', 'customer')
        ->withSum('orders', 'total_price')
        ->get()
        ->where('orders_sum_total_price', '>', 5000)
        ->count();

    $vipPercentage = $totalCustomers ? ($vipCount / $totalCustomers) * 100 : 0;

    $aov = Order::avg('total_price');
    $atRisk = User::where('role', 'customer')
        ->whereDoesntHave('orders', function($q){
            $q->where('created_at', '>=', now()->subDays(30));
        })->count();

    // 5. Return View
    return view('admin.customers.index', compact('customers','totalCustomers','vipPercentage','aov','atRisk'
    ));
}
    //
}
