<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use App\Services\ExampleService;
use App\Http\Controllers\FDFAdmin\ManagingUser;
use App\Models\User;
use App\Http\Requests\ManagingUserRequest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Connection;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\ParameterBag;
use Mockery as m;

class UserControllerTest extends TestCase
{

    /**
     * @var \Mockery\Mock|\Illuminate\Database\Connection
     */
    protected $db;

    /**
     * @var \Mockery\Mock|App\Models\User
     */
    protected $userMock;
    public function setUp()
    {
        $this->afterApplicationCreated(function () {
            $this->db = m::mock(
                Connection::class.'[select,update,insert,delete]',
                [m::mock(\PDO::class)]
            );
            $manager = $this->app['db'];
            $manager->setDefaultConnection('mock');
            $r = new \ReflectionClass($manager);
            $p = $r->getProperty('connections');
            $p->setAccessible(true);
            $list = $p->getValue($manager);
            $list['mock'] = $this->db;
            $p->setValue($manager, $list);
            $this->userMock = m::mock(User::class . '[update, delete]');
        });
        parent::setUp();
    }

    public function test_respone()
    {
        Event::fake();
        $controller = new ManagingUser();
        $response = $controller->store($request);
        $this->assertEquals(302, $response->getStatusCode());
    }

    // public function test_index_returns_view()
    // {
    //     $controller = new ManagingUser();
    //     $this->db->shouldReceive('select')->once()->withArgs([
    //         'select count(*) as aggregate from "users" where "role" = ?',
    //         ['1'],
    //         m::any(),
    //     ])->andReturn((object) ['aggregate' => 1]);
    //     $view = $controller->index();
    //     $this->assertEquals('fdfadmin.user.index', $view->getName());
    //     $this->assertArrayHasKey('userList', $view->getData());
    // }

    // public function test_it_stores_new_user()
    // {
    //     $request = new ManagingUserRequest();
    //     $controller = new ManagingUser();
    //     $data = [
    //         'name' => 'New User',
    //     ];
    //     $request = new Request();
    //     $request->headers->set('content-type', 'application/json');
    //     $request->setJson(new ParameterBag($data));
    //     // Mock Validation Presence Query
    //     $this->db->shouldReceive('select')->once();
    //     $this->db->getPdo()->shouldReceive('lastInsertId')->andReturn(333);
    //     $this->db->shouldReceive('insert')->once()
    //         ->withArgs([
    //             'insert into "users" ("name", "email" ,"password", "phone_number", "role", "gender", "address", "avatar","updated_at", "created_at") values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
    //             m::on(function ($arg) {
    //                 return is_array($arg) &&
    //                     $arg[0] == 'New User';
    //             })
    //         ])
    //         ->andReturn(true);
    //     /** @var RedirectResponse $response */
    //     $response = $controller->store($request);
    //     $this->assertInstanceOf(RedirectResponse::class, $response);
    //     $this->assertEquals(route('managing-user.index'), $response->headers->get('Location'));
    //     $this->assertEquals(333, $response->getSession()->get('created'));
    // }

    // public function test_it_throws_error_on_duplicate_name()
    // {
    //     $controller = new ManagingUser();
    //     $data = [
    //         'email' => 'tonquan160697@gmail.com',
    //     ];
    //     $this->db->shouldReceive('select')->once()->withArgs([
    //         'select count(*) as aggregate from "users" where "name" = ?',
    //         ['tonquan160697@gmail.com'],
    //         m::any(),
    //     ])->andReturn([(object) ['aggregate' => 1]]);
    //     $request = new Request();
    //     $request->headers->set('content-type', 'application/json');
    //     $request->setJson(new ParameterBag($data));
    //     $this->expectException(ValidationException::class);
    //     $controller->store($request);
    // }
}
