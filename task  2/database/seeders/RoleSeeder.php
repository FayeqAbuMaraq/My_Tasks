<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            // صلاحيات الإدارة العامة
            'manage users',
            'manage settings',
            
            'manage services', 
            'show services',   
            
            
            'manage orders',   
            'create orders',   
            'show my orders',  
            'update order status', 
            
            'show profile',
            'edit profile',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }


        // --- دور المدير (Admin) ---
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all()); // يأخذ كل الصلاحيات

        // --- دور الطبيب (Doctor) ---
        $doctorRole = Role::create(['name' => 'doctor']);
        $doctorRole->givePermissionTo([
            'show services',
            'create orders',
            'show my orders',
            'show profile',
            'edit profile',
        ]);

        // --- دور الفني (Technician) ---
        $techRole = Role::create(['name' => 'technician']);
        $techRole->givePermissionTo([
            'show services',
            'show my orders', 
            'update order status', 
            'show profile',
        ]);


        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@lazord.com', 
            'password' => Hash::make('password'), 
            'email_verified_at' => now(),
        ]);
        $adminUser->assignRole($adminRole);
    }
}
