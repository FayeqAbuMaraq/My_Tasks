<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(10);
        return view('dashboard.orders.index', compact('orders'));
    }


    public function show(Order $order)
    {
        $order->load('items.product'); 
        return view('dashboard.orders.show', compact('order'));
    }


    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);
        $order->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'تم تحديث حالة الطلب');
    }


    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('dashboard.orders.index')->with('success', 'تم حذف الطلب');
    }
}
