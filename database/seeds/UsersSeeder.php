<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Gerob Lee',
            'email' => 'gerobk@gmail.com',
            'password' => bcrypt('pa$$word')
        ]);

	    App\User::create([
	        'name' => 'Sams Test',
	        'email' => 'randall@giganticcreative.com',
	        'password' => bcrypt('samsT3st')
        ]);
    }
}
