<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إنشاء طبيب للتجربة
        $doctor = User::create([
            'name' => 'Dr. Ahmad',
            'email' => 'doctor@lazord.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $doctor->assignRole('doctor');
    }
}
