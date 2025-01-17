<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Smartphone',
                'description' => 'Latest Android smartphone',
                'price' => 699.99,
                'category_id' => 1,
                'author_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fantasy Novel',
                'description' => 'A thrilling fantasy novel',
                'price' => 19.99,
                'category_id' => 2,
                'author_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
