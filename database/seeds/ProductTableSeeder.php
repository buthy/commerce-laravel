<?php

use Illuminate\Database\Seeder;
use CodeCommerce\Product;

class ProductTableSeeder extends Seeder
{

    public function run()
    {
        Product::truncate();
        factory(Product::class, 50)->create();
    }

}