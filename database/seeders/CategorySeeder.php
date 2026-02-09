<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Cement & Concrete',
                'image' => 'https://images.unsplash.com/photo-1518709766631-a6a7f45921c3?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'icon' => 'fas fa-layer-group',
            ],
            [
                'name' => 'Steel & TMT Bars',
                'image' => 'https://images.unsplash.com/photo-1535732759880-bbd5c7265e3f?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'icon' => 'fas fa-bars',
            ],
            [
                'name' => 'Paints & Finishes',
                'image' => 'https://images.unsplash.com/photo-1562259949-e8e7689d7828?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'icon' => 'fas fa-paint-roller',
            ],
            [
                'name' => 'Plumbing Solutions',
                'image' => 'https://images.unsplash.com/photo-1585704032915-c3400ca199e7?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'icon' => 'fas fa-faucet',
            ],
            [
                'name' => 'Electrical Fittings',
                'image' => 'https://images.unsplash.com/photo-1555963966-926059d01068?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'icon' => 'fas fa-bolt',
            ],
            [
                'name' => 'Hardware Tools',
                'image' => 'https://images.unsplash.com/photo-1581235720704-06d3acfcb36f?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'icon' => 'fas fa-tools',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => Str::slug($category['name'])],
                [
                    'name' => $category['name'],
                    'image' => $category['image'],
                    'icon' => $category['icon'],
                ]
            );
        }
    }
}
