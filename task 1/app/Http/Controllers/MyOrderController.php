<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{
    // عرض قائمة طلبات المستخدم المسجل
    public function index()
    {
        // جلب الطلبات الخاصة بالمستخدم الحالي فقط
        $orders = Order::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('my-orders.index', compact('orders'));
    }

    // عرض تفاصيل طلب معين
    public function show($id)
    {
        // التأكد من أن الطلب يخص المستخدم الحالي 
        $order = Order::where('user_id', Auth::id())
            ->where('id', $id)
            ->with('items.product') // جلب المنتجات المرتبطة بالطلب
            ->firstOrFail();

        return view('my-orders.show', compact('order'));
    }
    // إلغاء طلب معين
        public function cancel($id)
    {
        // البحث عن الطلب والتأكد أنه يخص المستخدم الحالي
        $order = Order::where('user_id', Auth::id())
        ->where('id', $id)
        ->firstOrFail();

        // السماح بالإلغاء فقط إذا كانت الحالة "قيد الانتظار"
        if ($order->status == 'pending') {
            $order->update(['status' => 'cancelled']);
            return redirect()->back()->with('success', 'تم إلغاء الطلب بنجاح.');
        }

        return redirect()->back()->with('error', 'عذراً، لا يمكن إلغاء الطلب لأنه دخل مرحلة التجهيز أو الشحن.');
    }
}