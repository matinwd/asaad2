<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'slug' => 'product-1',
                'visibility' => 1,
                'price_status' => 1,
                'price' => 113,
                'en' => [
                    'name' => 'Product One named something',
                    'long_description' => 'Product One named something, Product One named something, Product One named something, Product One named something ,Product One named something Product One named something,Product One named something Product One named something,Product One named something',
                    'short_description' => 'Product One named something, Product One named something, Product One named something',
                    'tags' => 'Product, Hello'
                ] ,'de' => [
                    'name' => 'Product One named something',
                    'long_description' => 'Product One named something, Product One named something, Product One named something, Product One named something ,Product One named something Product One named something,Product One named something Product One named something,Product One named something',
                    'short_description' => 'Product One named something, Product One named something, Product One named something',
                    'tags' => 'Product, Hello'
                ]
            ], [
                'slug' => 'product-2',
                'visibility' => 1,
                'price_status' => 1,
                'price' => 113,
                'en' => [
                    'name' => 'Product two named something',
                    'long_description' => 'Product two named something, Product One named something, Product One named something, Product One named something ,Product One named something Product One named something,Product One named something Product One named something,Product One named something',
                    'short_description' => 'Product two named something, Product One named something, Product One named something',
                    'tags' => 'Product1, Hello'
                ] ,'de' => [
                    'name' => 'Product One named something',
                    'long_description' => 'Product One named something, Product One named something, Product One named something, Product One named something ,Product One named something Product One named something,Product One named something Product One named something,Product One named something',
                    'short_description' => 'Product One named something, Product One named something, Product One named something',
                    'tags' => 'Product, Hello'
                ]
            ],[
                'slug' => 'product-3',
                'visibility' => 1,
                'price_status' => 1,
                'price' => 113,
                'en' => [
                    'name' => 'Product three named something',
                    'long_description' => 'Product three named something, Product One named something, Product One named something, Product One named something ,Product One named something Product One named something,Product One named something Product One named something,Product One named something',
                    'short_description' => 'Product three named something, Product One named something, Product One named something',
                    'tags' => 'Product12, Hello'
                ] ,'de' => [
                    'name' => 'Product One named something',
                    'long_description' => 'Product One named something, Product One named something, Product One named something, Product One named something ,Product One named something Product One named something,Product One named something Product One named something,Product One named something',
                    'short_description' => 'Product One named something, Product One named something, Product One named something',
                    'tags' => 'Product, Hello'
                ]
            ],
        ];

        foreach ($products ?? [] as $product){
            Product::create($product);
        }
    }
}
