<?php

use Illuminate\Database\Seeder;

class OdersDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders')->insert([
            array('date_order'=>'2017-02-15 14:12:57','note'=>'abc', 'status'=>1, 'total_payment'=> 36000, 'user_id'=>2),
        ]);
    }
}
