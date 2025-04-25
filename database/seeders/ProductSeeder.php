<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Create some categories first
        $categories = [
            ['name' => 'Elektronik', 'slug' => 'elektronik'],
            ['name' => 'Fashion', 'slug' => 'fashion'],
            ['name' => 'Makanan', 'slug' => 'makanan'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create some products
        $products = [
            [
                'name' => 'Laptop Gaming XYZ',
                'slug' => 'laptop-gaming-xyz',
                'category_id' => 1,
                'description' => 'Laptop gaming dengan performa tinggi',
                'price' => 15000000,
                'original_price' => 18000000,
                'discount' => 17,
                'stock' => 10,
                'featured' => true,
                'weight' => 2500,
                'specifications' => [
                    'Processor: Intel Core i7',
                    'RAM: 16GB',
                    'Storage: 512GB SSD'
                ]
            ],
            [
                'name' => 'Kemeja Casual Pria',
                'slug' => 'kemeja-casual-pria',
                'category_id' => 2,
                'description' => 'Kemeja casual nyaman untuk sehari-hari',
                'price' => 199000,
                'original_price' => 250000,
                'discount' => 20,
                'stock' => 50,
                'featured' => false,
                'weight' => 200,
                'specifications' => [
                    'Bahan: Cotton',
                    'Ukuran: M, L, XL',
                    'Warna: Putih, Biru, Hitam'
                ]
            ],
            [
                'name' => 'Snack Box Premium',
                'slug' => 'snack-box-premium',
                'category_id' => 3,
                'description' => 'Kumpulan snack premium dalam satu box',
                'price' => 150000,
                'original_price' => 150000,
                'discount' => 0,
                'stock' => 30,
                'featured' => true,
                'weight' => 500,
                'specifications' => [
                    'Isi: 10 macam snack',
                    'Best before: 6 bulan',
                    'Halal'
                ]
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
