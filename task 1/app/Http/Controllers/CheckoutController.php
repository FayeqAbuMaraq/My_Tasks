<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    // عرض صفحة إتمام الطلب
    public function index()
    {
        $cart = session()->get('cart');
        
        // إذا كانت السلة فارغة، نعيده للمتجر
        if(!$cart || count($cart) == 0) {
            return redirect()->route('home')->with('error', 'سلتك فارغة!');
        }

        $total = 0;
        foreach($cart as $details) {
            $total += $details['price'] * $details['quantity'];
        }

        return view('checkout.index', compact('cart', 'total'));
    }

    // حفظ الطلب (الدفع عند الاستلام )
    public function placeOrder(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $cart = session()->get('cart');


        if(!$cart || count($cart) == 0) {
            return redirect()->route('home')->with('error', 'سلتك فارغة!');
        }

        $total = 0;
        foreach($cart as $details) {
            $total += $details['price'] * $details['quantity'];
        }

        DB::beginTransaction();

        try {
            // 1. إنشاء الطلب الرئيسي
            $order = Order::create([
                'user_id' => Auth::id(), // null إذا كان زائراً
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'address' => $request->address,
                'total_amount' => $total,
                'status' => 'pending', // الحالة الافتراضية
            ]);

            // 2. نقل عناصر السلة إلى OrderItems
            foreach($cart as $id => $details) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $details['quantity'],
                    'price' => $details['price'],
                ]);
            }

            // 3. إفراغ السلة
            session()->forget('cart');

            DB::commit();

            return redirect()->route('home')->with('success', 'تم استلام طلبك بنجاح! رقم الطلب: #' . $order->id);

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'حدث خطأ أثناء معالجة الطلب، يرجى المحاولة مرة أخرى.');
        }
    }
}