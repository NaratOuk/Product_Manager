<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Wireless Headphones',
                'description' => 'High-quality wireless headphones with noise cancellation and 30-hour battery life.',
                'price' => 99.99,
                'quantity' => 45,
            ],
            [
                'name' => 'USB-C Cable',
                'description' => 'Durable 2-meter USB-C charging cable compatible with most devices.',
                'price' => 12.99,
                'quantity' => 150,
            ],
            [
                'name' => 'Mechanical Keyboard',
                'description' => 'RGB backlit mechanical keyboard with customizable switches and macro keys.',
                'price' => 149.99,
                'quantity' => 28,
            ],
            [
                'name' => '4K Monitor',
                'description' => 'Ultra-sharp 27-inch 4K display perfect for professional work and gaming.',
                'price' => 499.99,
                'quantity' => 12,
            ],
            [
                'name' => 'Webcam 1080p',
                'description' => 'Crystal clear 1080p webcam with built-in microphone for streaming and calls.',
                'price' => 59.99,
                'quantity' => 67,
            ],
            [
                'name' => 'Portable SSD 1TB',
                'description' => 'Fast external solid state drive with 1TB storage capacity.',
                'price' => 129.99,
                'quantity' => 34,
            ],
            [
                'name' => 'Phone Stand',
                'description' => 'Adjustable aluminum phone stand suitable for all smartphone sizes.',
                'price' => 19.99,
                'quantity' => 0,
            ],
            [
                'name' => 'Desk Lamp LED',
                'description' => 'Energy-efficient LED desk lamp with adjustable brightness and color temperature.',
                'price' => 44.99,
                'quantity' => 55,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

