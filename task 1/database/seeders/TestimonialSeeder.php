<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('testimonials')->insert([
            ['name' => 'أحمد', 'content' => 'رائع جدا', 'rating' => 5, 'avatar_color' => 'primary'],
            ['name' => 'باسم', 'content' => 'روعة', 'rating' => 4, 'avatar_color' => 'success'],
            ['name' => 'ندى', 'content' => 'عن تجربة الجهاز ممتاز', 'rating' => 5, 'avatar_color' => 'warning'],
            ['name' => 'أيهم', 'content' => 'Good brand', 'rating' => 5, 'avatar_color' => 'info'],
        ]);
    }
}
