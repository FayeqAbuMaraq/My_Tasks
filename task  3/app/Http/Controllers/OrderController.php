<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function userOrders() {
        $orders = Order::where('user_id', auth()->id())
                    ->with('items.product')
                    ->latest()
                    ->get();
                    
        return view('orders.my-orders', compact('orders'));
    }
    public function show(Order $order)
    {
        $order->load('items.product'); 
        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);
        $order->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'تم تحديث حالة الطلب');
    }

public function adminIndex() {
    $orders = Order::latest()->get();
    return view('admin.orders.index', compact('orders'));
}



public function updateStatus(Request $request, Order $order) {
    $order->update(['status' => $request->status]);
    return back()->with('success', 'تم تحديث حالة الطلب بنجاح');
}

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'تم حذف الطلب');
    }
}
