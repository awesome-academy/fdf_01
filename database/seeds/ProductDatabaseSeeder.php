<?php

use Illuminate\Database\Seeder;

class ProductDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            array('name'=>'abc', 'description'=>'abc', 'price'=>12.000, 'avatar'=>'111.jpg', 'status'=>true, 'quantity'=>12, 'categories_id'=>1),
            array('name'=>'abc', 'description'=>'abc', 'price'=>12.000, 'avatar'=>'111.jpg', 'status'=>true, 'quantity'=>12, 'categories_id'=>3),
            array('name'=>'abc', 'description'=>'abc', 'price'=>12.000, 'avatar'=>'111.jpg', 'status'=>true, 'quantity'=>12, 'categories_id'=>4),
            array('name'=>'abc', 'description'=>'abc', 'price'=>12.000, 'avatar'=>'111.jpg', 'status'=>true, 'quantity'=>12, 'categories_id'=>1),
            array('name'=>'abc', 'description'=>'abc', 'price'=>12.000, 'avatar'=>'111.jpg', 'status'=>true, 'quantity'=>12, 'categories_id'=>2),
            array('name'=>'abc', 'description'=>'abc', 'price'=>12.000, 'avatar'=>'111.jpg', 'status'=>true, 'quantity'=>12, 'categories_id'=>3),
            array('name'=>'abc', 'description'=>'abc', 'price'=>12.000, 'avatar'=>'111.jpg', 'status'=>true, 'quantity'=>12, 'categories_id'=>3),
            array('name'=>'abc', 'description'=>'abc', 'price'=>12.000, 'avatar'=>'111.jpg', 'status'=>true, 'quantity'=>12, 'categories_id'=>3),
            array('name'=>'abc', 'description'=>'abc', 'price'=>12.000, 'avatar'=>'111.jpg', 'status'=>true, 'quantity'=>12, 'categories_id'=>1),
            array('name'=>'abc', 'description'=>'abc', 'price'=>12.000, 'avatar'=>'111.jpg', 'status'=>true, 'quantity'=>12, 'categories_id'=>2),
            array('name'=>'abc', 'description'=>'abc', 'price'=>12.000, 'avatar'=>'111.jpg', 'status'=>true, 'quantity'=>12, 'categories_id'=>2),
        ]);
    }
}
