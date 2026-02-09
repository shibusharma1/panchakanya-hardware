<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();

        if ($categories->isEmpty()) {
            return;
        }

        $products = [
            [
                'name' => 'Premium OPC Cement',
                'price' => 750.00,
                'description' => 'High-quality Ordinary Portland Cement for strong foundations.',
                'image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'is_featured' => true,
                'is_top_selling' => true,
            ],
            [
                'name' => 'TMT Steel Bars (12mm)',
                'price' => 110.00,
                'description' => 'Earthquake resistant TMT bars for construction.',
                'image' => 'https://images.unsplash.com/photo-1535732759880-bbd5c7265e3f?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'is_featured' => true,
                'is_top_selling' => true,
            ],
            [
                'name' => 'Weather Proof Exterior Paint',
                'price' => 2500.00,
                'description' => 'Long-lasting weather protection for exterior walls.',
                'image' => 'https://images.unsplash.com/photo-1589939705384-5185137a7f0f?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'is_featured' => true,
                'is_top_selling' => false,
            ],
            [
                'name' => 'Brass Bathroom Faucet',
                'price' => 4500.00,
                'description' => 'Elegant brass faucet with ceramic cartridge.',
                'image' => 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'is_featured' => false,
                'is_top_selling' => true,
            ],
            [
                'name' => 'LED Panel Light (12W)',
                'price' => 450.00,
                'description' => 'Energy efficient LED panel light for ceiling.',
                'image' => 'https://images.unsplash.com/photo-1565814329452-e1efa11c5b89?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'is_featured' => true,
                'is_top_selling' => true,
            ],
            [
                'name' => 'Cordless Power Drill',
                'price' => 8500.00,
                'description' => '18V Cordless drill with dual battery pack.',
                'image' => 'https://images.unsplash.com/photo-1504148455328-c376907d081c?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'is_featured' => true,
                'is_top_selling' => true,
            ],
             [
                'name' => 'Safety Helmet',
                'price' => 350.00,
                'description' => 'Industrial grade safety helmet.',
                'image' => 'https://images.unsplash.com/photo-1581092921461-39b9d08a9b21?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'is_featured' => false,
                'is_top_selling' => true,
            ],
             [
                'name' => 'Ceramic Floor Tiles',
                'price' => 120.00,
                'description' => 'Premium ceramic floor tiles 60x60cm.',
                'image' => 'https://images.unsplash.com/photo-1620626012053-93867853d3d6?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'is_featured' => true,
                'is_top_selling' => false,
            ],
        ];

        foreach ($products as $productData) {
            Product::updateOrCreate(
                ['slug' => Str::slug($productData['name'])],
                [
                    'category_id' => $categories->random()->id,
                    'name' => $productData['name'],
                    'image' => $productData['image'],
                    'price' => $productData['price'],
                    'description' => $productData['description'],
                    'is_featured' => $productData['is_featured'],
                    'is_top_selling' => $productData['is_top_selling'],
                ]
            );
        }
    }
}
