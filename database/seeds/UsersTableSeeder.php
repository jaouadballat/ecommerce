<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
        	'name' => 'jaouad ballat',
        	'email' => 'jaouad.ballat@gmail.com',
        	'password' => bcrypt('admin')
        ]);
    }
}
