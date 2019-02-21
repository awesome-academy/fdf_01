<?php

namespace Tests\Unit\Factories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class UserFactoryTest extends TestCase
{
    private $mUser;

    public function setUp()
    {
        parent::setup();

        $this->mUser = factory(User::class)->make();
    }

    public function test_user_has_email()
    {
        $this->assertNotEmpty($this->mUser->email);
    }

    public function test_user_has_address()
    {
        $this->assertNotEmpty($this->mUser->address);
    }
}
