<?php

use Illuminate\Database\Seeder;

class DetailOdersDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('detail_orders')->insert([
            array('order_id'=>1, 'product_id'=>1, 'amount'=> 5.000),
            array('order_id'=>2, 'product_id'=>4, 'amount'=> 5.000),
            array('order_id'=>3, 'product_id'=>1, 'amount'=> 5.000),
            array('order_id'=>4, 'product_id'=>3, 'amount'=> 5.000),
            array('order_id'=>2, 'product_id'=>5, 'amount'=> 5.000),
            array('order_id'=>3, 'product_id'=>3, 'amount'=> 5.000),
            array('order_id'=>5, 'product_id'=>4, 'amount'=> 5.000),
            array('order_id'=>6, 'product_id'=>3, 'amount'=> 5.000),
            array('order_id'=>3, 'product_id'=>4, 'amount'=> 5.000),
            array('order_id'=>2, 'product_id'=>5, 'amount'=> 5.000),
        ]);
    }
}
