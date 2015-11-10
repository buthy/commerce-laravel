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
                'password' => bcrypt('Mdavid-1903@suporte'),
                'remember_token' => str_random(10),
            ]
        );
    }

}