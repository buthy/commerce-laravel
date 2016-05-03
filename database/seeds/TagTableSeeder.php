<?php

use Illuminate\Database\Seeder;
use CodeCommerce\Tag;

class TagTableSeeder extends Seeder
{

    public function run()
    {
        Tag::truncate();
        factory(Tag::class, 20)->create();
    }

}