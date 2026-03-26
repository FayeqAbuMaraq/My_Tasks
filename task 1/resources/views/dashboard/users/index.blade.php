<x-app-layout>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-dark border-end border-5 border-success pe-3">إدارة المستخدمين</h3>
            <a href="{{ route('dashboard.users.create') }}" class="btn text-white fw-bold shadow-sm" style="background-color: var(--primary-green);">
                <i class="fas fa-user-plus me-1"></i> إضافة مستخدم
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
                            <th scope="col" class="py-3">الاسم</th>
                            <th scope="col" class="py-3">البريد الإلكتروني</th>
                            <th scope="col" class="py-3">الدور (Role)</th>
                            <th scope="col" class="py-3 text-center">إجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <th scope="row" class="ps-4">{{ $user->id }}</th>
                            <td class="fw-bold">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    <span class="badge bg-primary">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td class="text-center">
                                <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-sm btn-light text-primary"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('حذف المستخدم؟')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light text-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center py-4 text-muted">لا يوجد مستخدمين.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($users->hasPages())
                <div class="card-footer bg-white border-0 py-3">{{ $users->links() }}</div>
            @endif
        </div>
    </div>
</x-app-layout>