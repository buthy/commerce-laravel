<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::statement('SET foreign_key_checks = 0');

        $this->call('UserTableSeeder');
        $this->call('CategoryTableSeeder');
        $this->call('ProductTableSeeder');
        $this->call('TagTableSeeder');

        DB::statement('SET foreign_key_checks = 1');

        Model::reguard();
    }
}
