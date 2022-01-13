<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //creating fake data for the product table
        $this->call(UserTableSeeder::class);
        $this->call(CategorySeeder::class);
        \App\Models\Product::factory(100)->create();
    }
}
