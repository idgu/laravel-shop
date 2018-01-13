<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $product = new App\Product();
        $product->brand = 'Cannon';
        $product->model = 'mg7';
        $product->price = 399;
        $product->description = 'Product description';
        $product->save();

        $product = new App\Product();
        $product->brand = 'Sony';
        $product->model = 'mfdas';
        $product->price = 499;
        $product->description = 'Product description';
        $product->save();

        $product = new App\Product();
        $product->brand = 'Codac';
        $product->model = 'mgfdas';
        $product->price = 199;
        $product->description = 'Product description';
        $product->save();

        $product = new App\Product();
        $product->brand = 'LG';
        $product->model = 'k2';
        $product->price = 599;
        $product->description = 'Product description';
        $product->save();
    }
}
