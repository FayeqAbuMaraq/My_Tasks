<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'id' => 1, // نثبت الرقم 1 للهواتف
                'name' => 'الأجهزة الخلوية', 
                'slug' => 'mobile-phones', 
                'image' => '',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 2, // نثبت الرقم 2 للمنزل الذكي
                'name' => 'أجهزة المنزل الذكية', 
                'slug' => 'smart-home', 
                'image' => '',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 3,
                'name' => 'اجهزة لوحية و كمبيوتر', 
                'slug' => 'computers', 
                'image' => '',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 4,
                'name' => 'سماعات', 
                'slug' => 'headphones', 
                'image' => '',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 5,
                'name' => 'اكسسوارات اللعب', 
                'slug' => 'gaming', 
                'image' => '',
                'created_at' => now(), 'updated_at' => now()
            ],
        ]);
    }
}
