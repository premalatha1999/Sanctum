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
        DB::table('users')->insert([
		    'name' => 'prem',
		    'email' => 'prem@gmail.com',
		    'password' => Hash::make('12345')
		]);
    }
}
