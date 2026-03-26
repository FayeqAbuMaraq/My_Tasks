<x-app-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <a href="{{ route('pages.learning') }}" class="text-decoration-none text-muted mb-3 d-inline-block">
                    <i class="fas fa-arrow-right me-1"></i> العودة للمقالات
                </a>
                
                <h1 class="fw-bold display-5 mb-3">{{ $post->title }}</h1>
                <div class="d-flex align-items-center mb-4 text-muted">
                    <i class="far fa-user me-2"></i> {{ $post->user->name ?? 'Admin' }}
                    <span class="mx-2">|</span>
                    <i class="far fa-clock me-2"></i> {{ $post->created_at->format('d M, Y') }}
                </div>

                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="w-100 rounded-4 mb-4 shadow-sm" alt="{{ $post->title }}">
                @endif

                <div class="bg-white p-5 rounded-4 shadow-sm article-content">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
```

---

### الخطوة 5: المسارات (Routes)

الآن نربط كل شيء في `web.php`.

```php
use App\Http\Controllers\PostController;

// 1. المسارات العامة (للأطباء والزوار)
Route::get('/learning', [PostController::class, 'index'])->name('pages.learning');
Route::get('/article/{slug}', [PostController::class, 'show'])->name('blog.show');

// 2. مسارات الأدمن (داخل مجموعة Middleware الأدمن)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/posts', [PostController::class, 'adminIndex'])->name('admin.posts.index');
    Route::get('/admin/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('/admin/posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::delete('/admin/posts/{id}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
});