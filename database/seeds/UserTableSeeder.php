<?php

use Illuminate\Database\Seeder;
use CodeCommerce\User;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        User::truncate();
        factory('CodeCommerce\User')->create(
            [
                'name' => 'Marcus David',
                'email' => 'buthy88@gmail.com',
                'password' => bcrypt('123456'),
                'remember_token' => str_random(10),
            ]
        );
        factory(User::class, 5)->create();
    }

}