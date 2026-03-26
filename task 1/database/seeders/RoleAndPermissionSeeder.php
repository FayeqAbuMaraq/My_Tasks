<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name'=>'manage users']);
        Permission::create(['name'=>'manage products']);
        Permission::create(['name'=>'manage categories']);
        Permission::create(['name'=>'manage orders']);
        Permission::create(['name'=>'manage']);
        Permission::create(['name'=>'show products']);
        Permission::create(['name'=>'show categories']);
        Permission::create(['name'=>'show orders']);
        Permission::create(['name'=>'delete orders']);
        Permission::create(['name'=>'show profile']);
        Permission::create(['name'=>'edit profile']);
        Permission::create(['name'=>'show cart']);


        $admin = Role::create(['name' => 'admin']);
        $admin -> givePermissionTo(Permission::all());

        $user = Role::create(['name' => 'user']);
        $user -> givePermissionTo('show products','show categories','show orders','delete orders','show profile','edit profile','show cart');

                $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'), 
            'email_verified_at' => now(),
        ]);
        $adminUser->assignRole($admin);

    }
}
