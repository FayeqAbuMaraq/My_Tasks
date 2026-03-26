<x-app-layout>
    <div class="container py-5">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark  pe-3">لوحة التحكم</h2>
            <span class="text-muted">مرحباً، {{ Auth::user()->name }}</span>
        </div>

        <!-- بطاقات إحصائيات سريعة  -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm rounded border-start border-4 border-primary">
                    <small class="text-muted fw-bold">المستخدمين</small>
                    <h4 class="mb-0 fw-bold">{{ $usersCount }}</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm rounded border-start border-4 border-success">
                    <small class="text-muted fw-bold">المنتجات</small>
                    <h4 class="mb-0 fw-bold">{{ $productsCount }}</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm rounded border-start border-4 border-warning">
                    <small class="text-muted fw-bold">الطلبات</small>
                    <h4 class="mb-0 fw-bold">{{ $ordersCount }}</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm rounded border-start border-4 border-info">
                    <small class="text-muted fw-bold">الأقسام</small>
                    <h4 class="mb-0 fw-bold">{{ $categoriesCount }}</h4>
                </div>
            </div>
        </div>

        <div class="accordion shadow-sm rounded-3 overflow-hidden" id="dashboardAccordion">
            
            <!-- 1. قسم المستخدمين (Users) -->
            <div class="accordion-item border-0 border-bottom">
                <h2 class="accordion-header" id="headingUsers">
                    <button class="accordion-button fw-bold fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers" style="color: var(--primary-green);">
                        <i class="fas fa-users me-2 ms-2"></i> آخر المستخدمين المسجلين
                    </button>
                </h2>
                <div id="collapseUsers" class="accordion-collapse collapse show" aria-labelledby="headingUsers" data-bs-parent="#dashboardAccordion">
                    <div class="accordion-body bg-light">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="fw-bold">قائمة مختصرة</h5>
                            <div class="btn-group">
                                <a href="{{ route('dashboard.users.index') }}" class="btn btn-sm btn-outline-primary fw-bold">
                                    <i class="fas fa-list me-1"></i> عرض الكل
                                </a>
                                <a href="{{ route('dashboard.users.create') }}" class="btn btn-sm text-white fw-bold" style="background-color: var(--primary-green);">
                                    <i class="fas fa-plus me-1"></i> إضافة جديد
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive bg-white rounded shadow-sm p-3">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">الاسم</th>
                                        <th scope="col">البريد الإلكتروني</th>
                                        <th scope="col" class="text-center">إجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr><td colspan="4" class="text-center text-muted">لا يوجد بيانات</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. قسم الأقسام (Categories) -->
            <div class="accordion-item border-0 border-bottom">
                <h2 class="accordion-header" id="headingCategories">
                    <button class="accordion-button collapsed fw-bold fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategories" aria-expanded="false" aria-controls="collapseCategories" style="color: var(--primary-green);">
                        <i class="fas fa-layer-group me-2 ms-2"></i> آخر الأقسام المضافة
                    </button>
                </h2>
                <div id="collapseCategories" class="accordion-collapse collapse" aria-labelledby="headingCategories" data-bs-parent="#dashboardAccordion">
                    <div class="accordion-body bg-light">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="fw-bold">قائمة مختصرة</h5>
                            <div class="btn-group">
                                <a href="{{ route('dashboard.categories.index') }}" class="btn btn-sm btn-outline-primary fw-bold">
                                    <i class="fas fa-list me-1"></i> عرض الكل
                                </a>
                                <a href="{{ route('dashboard.categories.create') }}" class="btn btn-sm text-white fw-bold" style="background-color: var(--primary-green);">
                                    <i class="fas fa-plus me-1"></i> إضافة جديد
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive bg-white rounded shadow-sm p-3">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">الاسم</th>
                                        <th scope="col">الرابط (Slug)</th>
                                        <th scope="col" class="text-center">إجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td><span class="badge bg-secondary">{{ $category->slug }}</span></td>
                                        <td class="text-center">
                                            <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr><td colspan="4" class="text-center text-muted">لا يوجد بيانات</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. قسم المنتجات (Products) -->
            <div class="accordion-item border-0 border-bottom">
                <h2 class="accordion-header" id="headingProducts">
                    <button class="accordion-button collapsed fw-bold fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts" style="color: var(--primary-green);">
                        <i class="fas fa-box-open me-2 ms-2"></i> آخر المنتجات
                    </button>
                </h2>
                <div id="collapseProducts" class="accordion-collapse collapse" aria-labelledby="headingProducts" data-bs-parent="#dashboardAccordion">
                    <div class="accordion-body bg-light">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="fw-bold">قائمة مختصرة</h5>
                            <div class="btn-group">
                                <a href="{{ route('dashboard.products.index') }}" class="btn btn-sm btn-outline-primary fw-bold">
                                    <i class="fas fa-list me-1"></i> عرض الكل
                                </a>
                                <a href="{{ route('dashboard.products.create') }}" class="btn btn-sm text-white fw-bold" style="background-color: var(--primary-green);">
                                    <i class="fas fa-plus me-1"></i> إضافة جديد
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive bg-white rounded shadow-sm p-3">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">الصورة</th>
                                        <th scope="col">الاسم</th>
                                        <th scope="col">السعر</th>
                                        <th scope="col" class="text-center">إجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $product->id }}</th>
                                        <td><img src="{{ asset('storage/' . $product->image) }}" class="rounded" width="40"></td>
                                        <td class="fw-bold">{{ $product->name }}</td>
                                        <td class="text-success">${{ $product->price }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr><td colspan="5" class="text-center text-muted">لا يوجد بيانات</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. قسم الطلبات (Orders) -->
            <div class="accordion-item border-0">
                <h2 class="accordion-header" id="headingOrders">
                    <button class="accordion-button collapsed fw-bold fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOrders" aria-expanded="false" aria-controls="collapseOrders" style="color: var(--primary-green);">
                        <i class="fas fa-shopping-bag me-2 ms-2"></i> آخر الطلبات (Orders)
                    </button>
                </h2>
                <div id="collapseOrders" class="accordion-collapse collapse" aria-labelledby="headingOrders" data-bs-parent="#dashboardAccordion">
                    <div class="accordion-body bg-light">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="fw-bold">قائمة مختصرة</h5>
                            <div>
                                <a href="{{ route('dashboard.orders.index') }}" class="btn btn-sm btn-outline-primary fw-bold">
                                    <i class="fas fa-list me-1"></i> عرض كل الطلبات
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive bg-white rounded shadow-sm p-3">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">العميل</th>
                                        <th scope="col">الإجمالي</th>
                                        <th scope="col">الحالة</th>
                                        <th scope="col" class="text-center">إجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                    <tr>
                                        <th scope="row">{{ $order->id }}</th>
                                        <td>{{ $order->customer_name ?? $order->user->name ?? 'زائر' }}</td>
                                        <td class="fw-bold">${{ number_format($order->total_amount, 2) }}</td>
                                        <td>
                                            @if($order->status == 'pending') <span class="badge bg-warning text-dark">انتظار</span>
                                            @elseif($order->status == 'completed') <span class="badge bg-success">مكتمل</span>
                                            @else <span class="badge bg-secondary">{{ $order->status }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('dashboard.orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr><td colspan="5" class="text-center text-muted">لا يوجد طلبات حديثة</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>