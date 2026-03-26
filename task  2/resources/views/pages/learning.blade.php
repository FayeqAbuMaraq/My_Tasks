<x-app-layout>
    <!-- Header -->
    <div class="bg-primary py-5 mb-5 text-white position-relative overflow-hidden">
        <div class="container text-center position-relative z-1">
            <h1 class="fw-bold display-5 mb-3">أكاديمية لازورد</h1>
            <p class="lead text-white-50 mx-auto" style="max-width: 600px;">
                شاركنا المعرفة.. مقالات تقنية ونصائح إكلينيكية.
            </p>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row g-4">
            @forelse($posts as $post)
            <!-- المقال  -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden article-card">
                    <div class="position-relative">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top object-fit-cover" alt="{{ $post->title }}" style="height: 200px;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-image fa-3x text-muted opacity-25"></i>
                            </div>
                        @endif
                        <span class="badge bg-success position-absolute top-0 end-0 m-3">جديد</span>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <small class="text-muted"><i class="far fa-calendar-alt me-1"></i> {{ $post->created_at->format('d M Y') }}</small>
                        </div>
                        <h5 class="card-title fw-bold mb-3">{{ $post->title }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                        <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-link text-primary fw-bold p-0 text-decoration-none mt-3">اقرأ المزيد <i class="fas fa-arrow-left ms-1"></i></a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <h4 class="text-muted">لا توجد مقالات منشورة حالياً.</h4>
            </div>
            @endforelse
        </div>
    </div>
</x-app-layout>