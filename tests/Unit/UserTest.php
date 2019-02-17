<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use App\Models\Order;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_contains_valid_fillable_properties()
    {
        $m = new User();
        $this->assertEquals(['name', 'email', 'password', 'phone_number', 'gender', 'role', 'address', 'avatar'], $m->getFillable());
        $this->assertEquals('id', $m->getKeyName());
    }

    public function test_user_relation()
    {
        $m = new Order();
        $relation = $m->user();
        $this->assertEquals('user_id', $relation->getForeignKey());
        $this->assertEquals('id', $relation->getOwnerKey());
    }

}
