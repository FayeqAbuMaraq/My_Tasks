<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{

    public function index()
    {
        // جلب الطلبات مرتبة من الأحدث مع الترقيم (15 طلب لكل صفحة)
        $leads = Lead::latest()->paginate(15);
        
        return view('leads.index', compact('leads'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'first_name'   => 'required|string|max:100',
            'last_name'    => 'required|string|max:100',
            'clinic_name'  => 'required|string|max:200',
            'phone'        => 'required|string|max:20',
            'email'        => 'nullable|email|max:150',
            'message'      => 'nullable|string|max:1000',
        ]);

        Lead::create($request->all());
        return redirect()->back()->with('success', 'شكراً لتواصلك معنا دكتور، سيقوم فريقنا بالاتصال بك قريباً.');
    }


    public function show($id)
    {
        $lead = Lead::findOrFail($id);
        
        return view('leads.show', compact('lead'));
    }

    public function destroy($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->delete();

        return redirect()->route('leads.index')->with('success', 'تم حذف طلب الانضمام بنجاح.');
    }
}