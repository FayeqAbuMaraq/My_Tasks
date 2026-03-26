<x-app-layout>
    <div class="container py-5" dir="rtl">
        
        <!-- رأس الصفحة -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark">إدارة المقالات</h2>
                <p class="text-muted">التحكم في المحتوى التعليمي والمقالات المنشورة</p>
            </div>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary fw-bold shadow-sm">
                <i class="fas fa-plus me-2"></i> إضافة مقال جديد
            </a>
        </div>

        <!-- رسالة نجاح -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- جدول المقالات -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4" style="width: 40%;">عنوان المقال</th>
                                <th>الكاتب</th>
                                <th>الحالة</th>
                                <th>تاريخ النشر</th>
                                <th class="text-end pe-4">إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $post)
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            @if($post->image)
                                                <img src="{{ asset('storage/' . $post->image) }}" class="rounded-3 me-3 object-fit-cover shadow-sm" style="width: 60px; height: 60px;" alt="Post Image">
                                            @else
                                                <div class="bg-light rounded-3 me-3 d-flex align-items-center justify-content-center shadow-sm border" style="width: 60px; height: 60px;">
                                                    <i class="fas fa-image text-muted opacity-50"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <h6 class="fw-bold mb-1 text-dark">{{ Str::limit($post->title, 50) }}</h6>
                                                <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="small text-primary text-decoration-none">
                                                    <i class="fas fa-external-link-alt me-1"></i> عرض في الموقع
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border rounded-pill px-3">
                                            <i class="fas fa-user me-1 text-muted"></i> {{ $post->user->name ?? 'غير معروف' }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($post->is_published)
                                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">منشور</span>
                                        @else
                                            <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3">مسودة</span>
                                        @endif
                                    </td>
                                    <td class="text-muted small">
                                        {{ $post->created_at->format('Y-m-d') }}
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="btn-group">
                                            <!-- زر الحذف -->
                                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا المقال نهائياً؟');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-2" data-bs-toggle="tooltip" title="حذف المقال">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <div class="text-muted opacity-50 mb-3">
                                            <i class="fas fa-newspaper fa-4x"></i>
                                        </div>
                                        <h5 class="text-muted">لا توجد مقالات مضافة حالياً</h5>
                                        <p class="text-muted small">ابدأ بإضافة محتوى تعليمي للأطباء.</p>
                                        <a href="{{ route('admin.posts.create') }}" class="btn btn-outline-primary btn-sm mt-2">إضافة أول مقال</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- ترقيم الصفحات -->
            @if($posts->hasPages())
                <div class="card-footer bg-white border-0 py-3">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>