<?php

use Illuminate\Database\Seeder;
use CodeCommerce\Category;

class CategoryTableSeeder extends Seeder
{

    public function run()
    {
        Category::truncate();
        factory(Category::class, 20)->create();
    }

}