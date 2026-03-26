<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // 1. إنشاء الرتب
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // 2. إنشاء حساب المدير (عدل البيانات كما تحب)
        $admin = User::firstOrCreate(
            ['email' => 'admin@xbike.com'],
            [
                'name' => 'Admin X-Bike',
                'password' => Hash::make('password123'),
            ]
        );

        // 3. تعيين الرتبة للمدير
        $admin->assignRole($adminRole);
        
        $this->command->info('Admin user created with email: admin@xbike.com');
    }
}