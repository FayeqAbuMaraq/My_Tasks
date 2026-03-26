<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $phoneId = DB::table('categories')->where('slug', 'mobile-phones')->value('id');

        $products = [
            [
                'category_id' => $phoneId,
                'name' => 'Camon 30 Premier',
                'slug' => 'camon-30-premier',
                'short_description' => '512GB - 5G',
                'description' => 'تفاصيل كاملة عن الجهاز...',
                'price' => 1780.00,
                'sale_price' => null,
                'image' => '',
                'is_featured' => true,
            ],
            [
                'category_id' => $phoneId,
                'name' => 'Samsung Galaxy S22',
                'slug' => 'samsung-s22-ultra',
                'short_description' => 'Ultra 256 GB',
                'description' => 'هاتف سامسونج الرائد...',
                'price' => 1900.00,
                'sale_price' => 1780.00,
                'image' => '',
                'is_featured' => true,
            ],
            [
                'category_id' => $phoneId,
                'name' => 'Samsung Galaxy S25',
                'slug' => 'samsung-s25-ultra',
                'short_description' => 'Ultra 256 GB',
                'description' => 'أحدث إصدار...',
                'price' => 1780.00,
                'sale_price' => null,
                'image' => '',
                'is_featured' => true,
            ],
        ];

        DB::table('products')->insert($products);
    }
}
