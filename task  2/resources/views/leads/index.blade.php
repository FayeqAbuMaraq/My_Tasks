<x-app-layout>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark">طلبات الانضمام (Leads)</h2>
                <p class="text-muted">إدارة قائمة الأطباء المهتمين بخدمات المختبر</p>
            </div>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary fw-bold">
                <i class="fas fa-arrow-right me-2"></i> العودة للوحة التحكم
            </a>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4">اسم الطبيب</th>
                                <th>اسم العيادة</th>
                                <th>رقم الهاتف</th>
                                <th>تاريخ الطلب</th>
                                <th class="text-center">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($leads as $lead)
                                <tr>
                                    <td class="ps-4 fw-bold text-dark">{{ $lead->first_name }} {{ $lead->last_name }}</td>
                                    <td>{{ $lead->clinic_name }}</td>
                                    <td>{{ $lead->phone }}</td>
                                    <td class="text-muted">{{ $lead->created_at->format('Y-m-d H:i') }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('leads.show', $lead->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye me-1"></i> عرض التفاصيل
                                            </a>
                                            <form action="{{ route('leads.destroy', $lead->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا الطلب؟')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger ms-1">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">لا توجد طلبات انضمام حالياً</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($leads->hasPages())
                <div class="card-footer bg-white border-0 py-3">
                    {{ $leads->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>