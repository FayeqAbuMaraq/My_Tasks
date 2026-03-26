<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        
        // جلب الطلبات الخاصة بالطبيب فقط
        $orders = Order::where('user_id', $user->id)
            ->with('service')
            ->latest()
            ->paginate(10);

        // إحصائيات الطبيب
        $stats = [
            'processing' => Order::where('user_id', $user->id)->where('status', 'processing')->count(),
            'completed' => Order::where('user_id', $user->id)->where('status', 'completed')->count(),
            'pending' => Order::where('user_id', $user->id)->where('status', 'pending')->count(),
        ];

        return view('orders.index', compact('orders', 'stats'));
    }


    public function adminIndex()
    {
        $orders = Order::with(['service', 'user'])->latest()->paginate(15);

        $statusColors = [
            'pending' => 'bg-warning text-dark',
            'processing' => 'bg-info text-dark',
            'completed' => 'bg-success',
            'cancelled' => 'bg-danger',
        ];

        $statusText = [
            'pending' => 'قيد الانتظار',
            'processing' => 'جاري التنفيذ',
            'completed' => 'مكتمل',
            'cancelled' => 'ملغي',
        ];

        return view('orders.admin-index', compact('orders', 'statusColors', 'statusText'));
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function adminShow(Order $order)
    {
        return view('orders.admin-show', compact('order'));
    }


public function updateStatus(Request $request, $id) 
{
    $request->validate([
        'status' => 'required|in:pending,processing,completed,cancelled'
    ]);

    $order = Order::findOrFail($id); 
    $order->status = $request->status;
    $order->save(); 

    return redirect()->back()->with('success', 'تم تحديث حالة الطلب بنجاح إلى: ' . $request->status);
}

    public function create(Request $request)
    {
        $services = Service::where('is_active', true)->get();
        $selectedServiceId = $request->query('service_id');

        return view('orders.create', compact('services', 'selectedServiceId'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'patient_gender' => 'required|in:male,female', 
            'service_id' => 'required|exists:services,id',
            'due_date' => 'required|date|after:today', 
            'teeth_numbers' => 'required|array',
            'instructions' => 'nullable|string',
        ]);

        $service = Service::find($request->service_id);

        Order::create([
            'user_id' => Auth::id(),
            'patient_name' => $request->patient_name,
            'patient_gender' => $request->patient_gender, 
            'service_id' => $request->service_id,
            'shade' => $request->shade,
            'due_date' => $request->due_date,
            'teeth_numbers' => $request->teeth_numbers, 
            'instructions' => $request->instructions,
            'status' => 'pending',
            'total_price' => $service->price * count($request->teeth_numbers),
        ]);

        return redirect()->route('orders.index')->with('success', 'تم إرسال طلبك للمختبر بنجاح');
    }

public function destroy(Order $order)
{
        $order->delete();
        return redirect()->route('orders.admin-index')->with('success', 'تم حذف الخدمة بنجاح.');
}

}

