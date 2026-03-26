<x-app-layout>
    <div class="container py-5">
        <!-- رأس الصفحة -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark">إدارة الخدمات</h2>
                <p class="text-muted">إضافة وتعديل أو حذف خدمات المختبر</p>
            </div>
            <button class="btn btn-success fw-bold" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                <i class="fas fa-plus me-2"></i> إضافة خدمة جديدة
            </button>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- جدول إدارة الخدمات -->
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4">اسم الخدمة</th>
                                <th>السعر (₪)</th>
                                <th>الوصف</th>
                                <th class="text-center">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($services as $service)
                                <tr>
                                    <td class="ps-4 fw-bold text-dark">{{ $service->name }}</td>
                                    <td class="text-success fw-bold">{{ $service->price }} ₪</td>
                                    <td class="text-muted small">{{ Str::limit($service->description, 50) }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <!-- زر التعديل -->
                                            <button class="btn btn-sm btn-outline-primary me-2 rounded-2" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editServiceModal{{ $service->id }}">
                                                <i class="fas fa-edit"></i> تعديل
                                            </button>
                                            
                                            <!-- زر الحذف -->
                                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذه الخدمة؟')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-2">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- مودال تعديل الخدمة (مكرر لكل خدمة) -->
                                @include('services.edit', ['service' => $service])
                                
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-muted">لا توجد خدمات مضافة حالياً</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- مودال إضافة خدمة جديدة -->
    @include('services.create')
</x-app-layout>