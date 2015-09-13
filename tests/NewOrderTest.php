<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NewOrderTest extends TestCase
{
    /**
     * Test that Login works.
     *
     * @return void
     */
    public function testLogin()
    {
        $user = \App\User::where('username', 'glk')->first();

        $this->actingAs($user)
            ->visit('/werx/order/new/manufacturer')
            ->see('In-Store Device Repair')
            ->select('AppleSC', 'manufacturer')
            ->press('Select manufacturer')
            ->see('Customer Information')
            ->type('Bob', 'first_name')
            ->type('Loblaw', 'last_name')
            ->type('bobloblaw@example.org', 'email')
            ->type('123-456-7890', 'phone')
            ->type('123 Somewhere St', 'address')
            ->type('Nowhere', 'city');
        ;
    }

}
