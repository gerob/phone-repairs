<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    /**
     * Test that Login works.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->visit('/')
            ->see('Login')
            ->type('glk', 'username')
            ->type('pa$$word', 'password')
            ->press('Login')
            ->see('Mobile Device Repair Portal');
    }

    public function testLogout()
    {
        $this->visit('/')
            ->see('Login')
            ->type('glk', 'username')
            ->type('pa$$word', 'password')
            ->press('Login')
            ->see('Mobile Device Repair Portal')
            ->visit('/logout')
            ->see('Login');
    }
}
