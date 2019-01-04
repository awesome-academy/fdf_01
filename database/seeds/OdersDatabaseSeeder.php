<?php

use Illuminate\Database\Seeder;

class OdersDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders')->insert([
            array('user_id'=>1, 'status'=>true, 'total_payment'=> 36.000),
            array('user_id'=>2, 'status'=>true, 'total_payment'=> 36.000),
            array('user_id'=>3, 'status'=>false, 'total_payment'=> 36.000),
            array('user_id'=>4, 'status'=>true, 'total_payment'=> 36.000),
            array('user_id'=>2, 'status'=>false, 'total_payment'=> 36.000),
            array('user_id'=>3, 'status'=>true, 'total_payment'=> 36.000),
            array('user_id'=>5, 'status'=>false, 'total_payment'=> 36.000),
            array('user_id'=>3, 'status'=>true, 'total_payment'=> 36.000),
            array('user_id'=>3, 'status'=>true, 'total_payment'=> 36.000),
            array('user_id'=>3, 'status'=>true, 'total_payment'=> 36.000),
        ]);
    }
}
