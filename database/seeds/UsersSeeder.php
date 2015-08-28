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
        $stores = \App\Store::all();


        $user1 = App\User::create([
            'name'     => 'Gerob Lee',
            'username' => 'glk',
            'email'    => 'gerobk@gmail.com',
            'password' => bcrypt('pa$$word'),
        ]);

        $user2 = App\User::create([
            'name'     => 'Sams Test',
            'username' => 'samstest',
            'email'    => 'randall@giganticcreative.com',
            'password' => bcrypt('samsT3st')
        ]);

        foreach ($stores as $index => $store) {
            $user1->stores()->attach($store->id, ['default' => ($index == 1 ? true : false) ]);
            $user2->stores()->attach($store->id, ['default' => ($index == 1 ? true : false)]);
        }
    }
}
