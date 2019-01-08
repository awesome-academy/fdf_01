<?php

use Illuminate\Database\Seeder;

class UsersDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            array('name'=>'abc1', 'email'=>'abc1@gmail.com', 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'phone_number'=>'0120129192', 'role'=>1, 'gender'=>1, 'address'=>'danang', 'avatar' => 'abc.jpg', 'remember_token' => str_random(10)),
            array('name'=>'abc2', 'email'=>'abc2@gmail.com', 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'phone_number'=>'0120129192', 'role'=>1, 'gender'=>1, 'address'=>'danang', 'avatar' => 'abc.jpg', 'remember_token' => str_random(10)),
            array('name'=>'abc3', 'email'=>'abc3@gmail.com', 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'phone_number'=>'0120129192', 'role'=>1, 'gender'=>2, 'address'=>'danang', 'avatar' => 'abc.jpg', 'remember_token' => str_random(10)),
            array('name'=>'abc4', 'email'=>'abc4@gmail.com', 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'phone_number'=>'0120129192', 'role'=>1, 'gender'=>1, 'address'=>'danang', 'avatar' => 'abc.jpg', 'remember_token' => str_random(10)),
            array('name'=>'abc5', 'email'=>'abc5@gmail.com', 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'phone_number'=>'0120129192', 'role'=>2, 'gender'=>2, 'address'=>'danang', 'avatar' => 'abc.jpg', 'remember_token' => str_random(10)),
            array('name'=>'abc6', 'email'=>'abc6@gmail.com', 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'phone_number'=>'0120129192', 'role'=>2, 'gender'=>2, 'address'=>'danang', 'avatar' => 'abc.jpg', 'remember_token' => str_random(10)),
            array('name'=>'abc7', 'email'=>'abc7@gmail.com', 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'phone_number'=>'0120129192', 'role'=>2, 'gender'=>1, 'address'=>'danang', 'avatar' => 'abc.jpg', 'remember_token' => str_random(10)),
            array('name'=>'abc8', 'email'=>'abc8@gmail.com', 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'phone_number'=>'0120129192', 'role'=>2, 'gender'=>1, 'address'=>'danang', 'avatar' => 'abc.jpg', 'remember_token' => str_random(10)),
        ]);
    }
}
