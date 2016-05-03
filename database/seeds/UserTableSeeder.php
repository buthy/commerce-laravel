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
                'email' => 'suporte@marcusdavid.com.br',
                'password' => bcrypt('mdads3'),
                'remember_token' => str_random(10),
            ]
        );
        factory(User::class, 5)->create();
    }

}