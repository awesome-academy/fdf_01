<?php

use Illuminate\Database\Seeder;

class CategoryDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            array('name'=>'abc', 'description'=>'abc', 'parent_id'=>1),
            array('name'=>'abc', 'description'=>'abc', 'parent_id'=>2),
            array('name'=>'abc', 'description'=>'abc', 'parent_id'=>1),
            array('name'=>'abc', 'description'=>'abc', 'parent_id'=>3),
            array('name'=>'abc', 'description'=>'abc', 'parent_id'=>2),
            array('name'=>'abc', 'description'=>'abc', 'parent_id'=>1),
        ]);
    }
}
