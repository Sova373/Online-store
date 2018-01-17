<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Product::count() == 0) {
            for($i = 0; $i < 5; $i++) {
                Product::create([
                    'name' => str_random(5),
                ]);
            }
        }
    }
}
