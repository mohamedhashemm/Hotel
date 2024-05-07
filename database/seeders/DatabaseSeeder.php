<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        store::factory(10)->create();
        Category::factory(25)->create();
        
        Product::factory(80)->create();
    }
}
