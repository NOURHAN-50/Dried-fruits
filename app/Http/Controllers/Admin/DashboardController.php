<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
{
    $totalRevenue = Order::sum('total_price');


    $cost = Order::sum('cost');

    $profit = Order::sum('profit');

    $todaySales = Order::whereDate('created_at', today())->sum('total_price');

    $totalOrders = Order::count();

    $activeCustomers = User::whereHas('orders')->count();

    $latestOrders = Order::with('customer')->latest()->take(5)->get();

    $totalUsers = User::where('role', 'customer')->count();

    $conversionRate = $totalOrders > 0 && $totalUsers > 0
    ? ($totalOrders / $totalUsers) * 100
    : 0;

    return view('admin.dashboard', compact(
        'totalRevenue',
        'todaySales',
        'totalOrders',
        'activeCustomers',
        'latestOrders',
        'conversionRate',
        'cost',
        'profit'
    ));
}
    //
}
