<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service; // استدعاء مودل الخدمات
use App\Models\Faq;     // استدعاء مودل الأسئلة الشائعة

class HomeController extends Controller
{
    public function index()
    {
        // 1. جلب الخدمات النشطة فقط
        $services = Service::where('is_active', true)->latest()->take(4)->get();

        // 2. جلب الأسئلة الشائعة النشطة
        $faqs = Faq::where('is_active', true)->get();

        // 3. تمرير البيانات إلى صفحة الـ index
        return view('index', compact('services', 'faqs'));
    }
}