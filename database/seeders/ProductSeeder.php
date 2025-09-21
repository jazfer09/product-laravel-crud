<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Laptop',
            'description' => 'High-performance laptop for professional use',
            'price' => 45000.00,
            'stock' => 15,
            'category' => 'Electronics'
        ]);

        Product::create([
            'name' => 'Coffee Mug',
            'description' => 'Premium ceramic coffee mug',
            'price' => 299.99,
            'stock' => 50,
            'category' => 'Kitchen'
        ]);

        Product::create([
            'name' => 'Book',
            'description' => 'Programming fundamentals book',
            'price' => 1299.00,
            'stock' => 8,
            'category' => 'Books'
        ]);
    }
}