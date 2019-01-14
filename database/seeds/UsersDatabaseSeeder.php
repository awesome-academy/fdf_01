<?php

use Illuminate\Database\Seeder;

class UsersDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            array('name'=>'abc', 'email'=>'abc1@gmail.com', 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'phone_number'=>'0120129192', 'role'=>1, 'gender'=>1, 'address'=>'danang', 'avatar' => 'default.jpeg', 'remember_token' => str_random(10)),
            array('name'=>'abc', 'email'=>'abc2@gmail.com', 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'phone_number'=>'0120129192', 'role'=>1, 'gender'=>1, 'address'=>'danang', 'avatar' => 'abc.jpeg', 'remember_token' => str_random(10)),
            array('name'=>'default', 'email'=>'abc3@gmail.com', 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'phone_number'=>'0120129192', 'role'=>2, 'gender'=>2, 'address'=>'danang', 'avatar' => 'default.jpeg', 'remember_token' => str_random(10)),
            array('name'=>'abc', 'email'=>'abc4@gmail.com', 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'phone_number'=>'0120129192', 'role'=>1, 'gender'=>1, 'address'=>'danang', 'avatar' => 'default.jpeg', 'remember_token' => str_random(10)),
            array('name'=>'abc', 'email'=>'abc5@gmail.com', 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'phone_number'=>'0120129192', 'role'=>2, 'gender'=>2, 'address'=>'danang', 'avatar' => 'default.jpeg', 'remember_token' => str_random(10)),
            array('name'=>'abc', 'email'=>'abc6@gmail.com', 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'phone_number'=>'0120129192', 'role'=>1, 'gender'=>2, 'address'=>'danang', 'avatar' => 'default.jpeg', 'remember_token' => str_random(10)),
            array('name'=>'abc', 'email'=>'abc7@gmail.com', 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'phone_number'=>'0120129192', 'role'=>1, 'gender'=>1, 'address'=>'danang', 'avatar' => 'default.jpeg', 'remember_token' => str_random(10)),
            array('name'=>'abc', 'email'=>'abc8@gmail.com', 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'phone_number'=>'0120129192', 'role'=>1, 'gender'=>1, 'address'=>'danang', 'avatar' => 'default.jpeg', 'remember_token' => str_random(10)),
        ]);
    }
}
