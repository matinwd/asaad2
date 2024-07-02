<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::create([
            'slug' => 'new-product',
            'visibility' => 1,
            'price_status' => 0,
            'en' => [
                'name' => 'new product',
                'long_description' => 'Hello this is my description for product',
                'short_description' => 'this is description'
            ],
            'de' => [
                'name' => 'new product',
                'long_description' => 'Hello this is my description for product',
                'short_description' => 'this is description'
            ]
        ]);
        Order::create([
            'name' => 'متین نوروزی',
            'email' => '100ztaa@gmail.com',
            'status' => 0,
            'description' => 'این توضیحات برای تست این ویژگی سایت',
            'product_id' => $product->id
        ]);
    }
}
