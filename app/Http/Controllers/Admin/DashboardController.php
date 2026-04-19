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
    // إجمالي الإيرادات
    $totalRevenue = Order::sum('total_price');


    // إجمالي التكلفة
    $cost = Order::sum('cost');

    // إجمالي الربح
    $profit = Order::sum('profit');

    // مبيعات اليوم
    $todaySales = Order::whereDate('created_at', today())->sum('total_price');

    // إجمالي الطلبات
    $totalOrders = Order::count();

    // العملاء النشطين (عندهم طلبات)
    $activeCustomers = User::whereHas('orders')->count();

    // آخر الطلبات
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
