<?php

use Illuminate\Database\Seeder;

class ProductDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            array('name'=>'Bánh trứng', 'description'=>'Đây là kem cà phê', 'price'=>125000, 'avatar'=>'phomai.jpg', 'status'=>1, 'quantity'=>123, 'categories_id'=>2), 
            array('name'=>'Kem chuối phủ socola', 'description'=>'Pizza con bò cười', 'price'=>123000, 'avatar'=>'saurieng.jpg', 'status'=>1, 'quantity'=>123, 'categories_id'=>2),
            array('name'=>'Bánh trứng', 'description'=>'Đây là kem cà phê', 'price'=>125000, 'avatar'=>'phomai.jpg', 'status'=>1, 'quantity'=>123, 'categories_id'=>1),
            array('name'=>'Bánh bông lan', 'description'=>'Đây là kem cà phê', 'price'=>125000, 'avatar'=>'default.jpg', 'status'=>1, 'quantity'=>123, 'categories_id'=>1),
            array('name'=>'Bánh trứng', 'description'=>'Đây là kem cà phê', 'price'=>125000, 'avatar'=>'default.jpg', 'status'=>1, 'quantity'=>123, 'categories_id'=>1),
            array('name'=>'Pizza', 'description'=>'Đây là kem cà phê', 'price'=>125000, 'avatar'=>'default.jpg', 'status'=>1, 'quantity'=>123, 'categories_id'=>1),         
        ]);
    }
}
