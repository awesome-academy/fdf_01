<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProductDatabaseSeeder::class,
            CategoryDatabaseSeeder::class,
            ImagesDatabaseSeeder::class,
            OdersDatabaseSeeder::class,
            DetailOdersDatabaseSeeder::class,
            ReviewsDatabaseSeeder::class,
            SuggestsDatabaseSeeder::class,
            HistoriesDatabaseSeeder::class,
            UsersDatabaseSeeder::class,
        ]);
    }
}
