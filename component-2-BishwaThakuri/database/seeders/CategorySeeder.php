<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //creating the fake dataqa for category
    public function run()
    {
        $categories = ['Book', 'CD', 'Game'];

        foreach ($categories as $category) {
            Category::create([
                'category' => $category
            ]);
        }
    }
}
