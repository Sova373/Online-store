<?php

use Illuminate\Database\Seeder;
use App\Sku;

class SKUsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = ['white', 'red', 'green', 'yellow', 'black', 'brown', 'gray', 'gray'];
        $sizes = [41, 42, 43, 45, 48, 41, 42];
        $products = \App\Product::all();
        foreach ($products as $product)
            foreach ($colors as $color)
                foreach ($sizes as $size) {
                    $sku = new Sku();
                    $sku->product_id = $product->id;
                    $sku->size = $size;
                    $sku->color = $color;
                    $sku->price = rand(100, 250);
                    $sku->createSku();
                }
    }

}
