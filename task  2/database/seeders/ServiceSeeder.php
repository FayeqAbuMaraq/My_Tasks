<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                $services = [
            [
                'name' => 'تيجان وجسور زركونيا',
                'slug' => 'zirconia-crowns',
                'description' => 'تيجان زركونيا عالية الشفافية ومتانة فائقة.',
                'price' => 100.00,
            ],
            [
                'name' => 'فينير E-max',
                'slug' => 'emax-veneers',
                'description' => 'قشور خزفية بجمالية طبيعية لا تضاهى.',
                'price' => 120.00,
            ],
            [
                'name' => 'زراعة الأسنان (Abutments)',
                'slug' => 'implant-abatements',
                'description' => 'دعامات مخصصة (Custom Abutments) لمختلف الأنظمة.',
                'price' => 150.00,
            ],
            [
                'name' => 'التقويم الشفاف',
                'slug' => 'clear-aligners',
                'description' => 'خطط علاجية رقمية وتقويم شفاف دقيق.',
                'price' => 200.00,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
