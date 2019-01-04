<?php

use Illuminate\Database\Seeder;

class HistoriesDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('histories')->insert([
            array('order_id'=>1, 'user_id'=>2),
            array('order_id'=>2, 'user_id'=>1),
            array('order_id'=>3, 'user_id'=>2),
            array('order_id'=>4, 'user_id'=>3),
            array('order_id'=>3, 'user_id'=>4),
            array('order_id'=>2, 'user_id'=>5),
        ]);
    }
}
