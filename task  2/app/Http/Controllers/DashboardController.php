<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use App\Models\Lead; // أضفنا موديل Leads
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'orders_count' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'services_count' => Service::count(),
            'users_count' => User::count(),
            'leads_count' => Lead::count(), 
        ];

        $recent_orders = Order::with(['user', 'service'])->latest()->take(5)->get();
        $recent_leads = Lead::latest()->take(5)->get(); 
        $services = Service::all();

        return view('dashboard', compact('stats', 'recent_orders', 'services', 'recent_leads'));
    }
}