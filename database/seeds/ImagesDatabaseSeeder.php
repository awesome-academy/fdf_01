<?php

use Illuminate\Database\Seeder;

class ImagesDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('images')->insert([
            array('name'=>'abc.jpg', 'product_id'=>1),
            array('name'=>'abc.jpg', 'product_id'=>2),
            array('name'=>'abc.jpg', 'product_id'=>3),
            array('name'=>'abc.jpg', 'product_id'=>2),
            array('name'=>'abc.jpg', 'product_id'=>4),
            array('name'=>'abc.jpg', 'product_id'=>5),
            array('name'=>'abc.jpg', 'product_id'=>6),
            array('name'=>'abc.jpg', 'product_id'=>7),
        ]);
    }
}
