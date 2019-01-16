<?php

use Illuminate\Database\Seeder;

class DetailOdersDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('detail_orders')->insert([
            array('order_id'=>1, 'product_id'=>1, 'price'=>'23000', 'amount'=> 5.000),
        ]);
    }
}
