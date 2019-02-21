<?php

namespace Tests\Unit\Views;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class UserViewTest extends TestCase
{
    private $mUser;

    public function setUp()
    {
        parent::setup();

        $this->mUser = factory(User::class)->create();
    }

    public function test_view_all_list_user()
    {
        $response = $this->get('/managing-user');

        $response->assertSee('login');
    }
}
