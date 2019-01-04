<?php

use Illuminate\Database\Seeder;

class ReviewsDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('reviews')->insert([
            array('user_id'=>1, 'product_id'=>1, 'rate'=> 6),
            array('user_id'=>2, 'product_id'=>1, 'rate'=> 3),
            array('user_id'=>3, 'product_id'=>3, 'rate'=> 2),
            array('user_id'=>4, 'product_id'=>4, 'rate'=> 3),
            array('user_id'=>1, 'product_id'=>5, 'rate'=> 3),
            array('user_id'=>1, 'product_id'=>3, 'rate'=> 1),
            array('user_id'=>1, 'product_id'=>3, 'rate'=> 3),
        ]);
    }
}
