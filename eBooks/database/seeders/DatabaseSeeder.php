<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            AuthorsTableSeeder::class,
            ProductsTableSeeder::class,
            CartsTableSeeder::class,
            OrdersTableSeeder::class,
        ]);
    }
}
