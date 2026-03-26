<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem; 
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    // عرض صفحة إتمام الطلب
    public function index()
    {
        $cart = session()->get('cart', []);
        
        // إذا كانت السلة فارغة، أعده للمتجر
        if (empty($cart)) {
            return redirect()->route('shop.index')->with('error', 'سلتك فارغة!');
        }

        // حساب الإجمالي
        $total = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        return view('checkout.index', compact('cart', 'total'));
    }

    // حفظ الطلب في قاعدة البيانات
    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('shop.index');
        }

        // 1. التحقق من صحة بيانات المشتري
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        $total = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        // استخدام Transaction لضمان حفظ الطلب وعناصره معاً أو التراجع إذا حدث خطأ
        DB::beginTransaction();
        try {
            // 2. إنشاء الطلب الرئيسي
            $order = Order::create([
                'user_id' => auth()->id(), 
                'customer_name' => $request->name,       
                'customer_phone' => $request->phone,     
                'address' => $request->address,
                'total_amount' => $total,                
                'status' => 'pending',
            ]);

            // 3. حفظ المنتجات داخل الطلب
            foreach ($cart as $item) {
                $order->items()->create([
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            // 4. إفراغ السلة بعد نجاح الطلب
            session()->forget('cart');
            DB::commit();

            return redirect()->route('checkout.success')->with('success', 'تم استلام طلبك بنجاح!');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'حدث خطأ أثناء معالجة الطلب: ' . $e->getMessage());
        }
    }

    // صفحة النجاح
    public function success()
    {
        return view('checkout.success');
    }
}