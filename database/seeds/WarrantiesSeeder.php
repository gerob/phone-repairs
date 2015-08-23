<?php

use Illuminate\Database\Seeder;

class WarrantiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $warranties = [
            [
                'one_year'  => '813583021627',
                'two_year'  => '813583021634',
                'one_price' => 4999,
                'two_price' => 6999
            ],
            [
                'one_year'  => '813583021658',
                'two_year'  => '813583021665',
                'one_price' => 3999,
                'two_price' => 4999
            ],
            [
                'one_year'  => '813583021641',
                'two_year'  => '813583021672',
                'one_price' => 2999,
                'two_price' => 3999
            ],
        ];

        foreach ($warranties as $warranty) {
            \App\Warranty::create([
                'one_year'  => $warranty['one_year'],
                'two_year'  => $warranty['two_year'],
                'one_price' => $warranty['one_price'],
                'two_price' => $warranty['two_price']
            ]);
        }
    }
}
