<x-app-layout>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-dark border-end border-5 border-success pe-3">إدارة الأقسام</h3>
            <a href="{{ route('dashboard.categories.create') }}" class="btn text-white fw-bold shadow-sm" style="background-color: var(--primary-green);">
                <i class="fas fa-plus me-1"></i> إضافة قسم
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-secondary">
                        <tr>
                            <th scope="col" class="ps-4 py-3">#</th>
                            <th scope="col" class="py-3">صورة</th>
                            <th scope="col" class="py-3">اسم القسم</th>
                            <th scope="col" class="py-3">عدد المنتجات</th>
                            <th scope="col" class="py-3 text-center">إجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr>
                            <th scope="row" class="ps-4">{{ $category->id }}</th>
                            <td>
                                @if($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" class="rounded shadow-sm" style="width: 40px; height: 40px; object-fit: cover;">
                                @else
                                    <span class="text-muted small">لا توجد صورة</span>
                                @endif
                            </td>
                            <td class="fw-bold">{{ $category->name }}</td>
                            <td><span class="badge bg-info text-dark">{{ $category->products_count ?? $category->products()->count() }}</span></td>
                            <td class="text-center">
                                <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn-sm btn-light text-primary"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('حذف القسم؟')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light text-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center py-4 text-muted">لا توجد أقسام.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($categories->hasPages())
                <div class="card-footer bg-white border-0 py-3">{{ $categories->links() }}</div>
            @endif
        </div>
    </div>
</x-app-layout>