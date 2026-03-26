<x-app-layout>
    <div class="container py-5">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-dark border-end border-5 border-success pe-3">إدارة المنتجات</h3>
            <a href="{{ route('dashboard.products.create') }}" class="btn text-white fw-bold shadow-sm" style="background-color: var(--primary-green);">
                <i class="fas fa-plus me-1"></i> إضافة منتج جديد
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light text-secondary">
                            <tr>
                                <th scope="col" class="ps-4 py-3">#</th>
                                <th scope="col" class="py-3">المنتج</th>
                                <th scope="col" class="py-3">القسم</th>
                                <th scope="col" class="py-3">السعر</th>
                                <th scope="col" class="py-3">الكمية</th>
                                <th scope="col" class="py-3 text-center">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <th scope="row" class="ps-4 text-muted">{{ $product->id }}</th>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="img" class="rounded-3 shadow-sm border" style="width: 50px; height: 50px; object-fit: cover;">
                                        <div class="ms-3">
                                            <h6 class="fw-bold mb-0 text-dark">{{ $product->name }}</h6>
                                            <small class="text-muted d-block text-truncate" style="max-width: 150px;">{{ $product->slug }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light text-dark border">{{ $product->category->name ?? 'غير محدد' }}</span></td>
                                <td class="fw-bold text-success">${{ $product->price }}</td>
                                <td>
                                    @if($product->quantity > 5)
                                        <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">{{ $product->quantity }} متوفر</span>
                                    @elseif($product->quantity > 0)
                                        <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill">{{ $product->quantity }} وشك النفاذ</span>
                                    @else
                                        <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill">نفذت الكمية</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('product.show', $product->slug) }}" target="_blank" class="btn btn-sm btn-light text-secondary" title="عرض في الموقع"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-sm btn-light text-primary" title="تعديل"><i class="fas fa-edit"></i></a>
                                        
                                        <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج نهائياً؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light text-danger" title="حذف"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="fas fa-box-open fa-3x mb-3 text-secondary opacity-50"></i>
                                    <p>لا توجد منتجات مضافة حتى الآن.</p>
                                    <a href="{{ route('dashboard.products.create') }}" class="btn btn-sm btn-outline-success mt-2">إضافة أول منتج</a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($products->hasPages())
                <div class="card-footer bg-white border-0 py-3">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>