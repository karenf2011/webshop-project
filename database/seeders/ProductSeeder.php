<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'brand_id'          => 1,
            'time_period_id'    => 3,
            'name'              => 'Kopje',
            'price'             => 23,
            'stock'             => 3,
            'design_year'       => 1970,
            'production_year'   => 1972
        ]);

        Product::create([
            'brand_id'          => 1,
            'time_period_id'    => 3,
            'name'              => 'Klein bord',
            'price'             => 15,
            'stock'             => 2,
            'design_year'       => 1970,
            'production_year'   => 1972
        ]);

        Product::create([
            'brand_id'          => 1,
            'time_period_id'    => 3,
            'name'              => 'Koffiekan',
            'price'             => 60,
            'stock'             => 1,
            'design_year'       => 1970,
            'production_year'   => 1972
        ]);

        Product::create([
            'brand_id'          => 2,
            'time_period_id'    => 4,
            'name'              => 'Kopje',
            'price'             => 20,
            'stock'             => 3,
            'design_year'       => 1980,
            'production_year'   => 1982
        ]);

        Product::create([
            'brand_id'          => 2,
            'time_period_id'    => 4,
            'name'              => 'Klein bord',
            'price'             => 18,
            'stock'             => 3,
            'design_year'       => 1980,
            'production_year'   => 1982
        ]);

        Product::create([
            'brand_id'          => 2,
            'time_period_id'    => 4,
            'name'              => 'Drinkglas',
            'price'             => 20,
            'stock'             => 3,
            'design_year'       => 1980,
            'production_year'   => 1982
        ]);

        Product::create([
            'brand_id'          => 3,
            'time_period_id'    => 4,
            'name'              => 'Klein bord',
            'price'             => 30,
            'stock'             => 2,
            'design_year'       => 1980,
            'production_year'   => 1982
        ]);

        Product::create([
            'brand_id'          => 3,
            'time_period_id'    => 4,
            'name'              => 'Ovenschaal',
            'price'             => 100,
            'stock'             => 2,
            'design_year'       => 1980,
            'production_year'   => 1982
        ]);

        Product::create([
            'brand_id'          => 3,
            'time_period_id'    => 4,
            'name'              => 'Siervogel',
            'price'             => 150,
            'stock'             => 1,
            'design_year'       => 1980,
            'production_year'   => 1982
        ]);

        Product::create([
            'brand_id'          => 4,
            'time_period_id'    => 1,
            'name'              => 'Bord',
            'price'             => 70,
            'stock'             => 4,
            'design_year'       => 1950,
            'production_year'   => 1952
        ]);

        Product::create([
            'brand_id'          => 4,
            'time_period_id'    => 1,
            'name'              => 'Schaal',
            'price'             => 70,
            'stock'             => 4,
            'design_year'       => 1950,
            'production_year'   => 1952
        ]);

        Product::create([
            'brand_id'          => 4,
            'time_period_id'    => 1,
            'name'              => 'Bakje',
            'price'             => 30,
            'stock'             => 4,
            'design_year'       => 1950,
            'production_year'   => 1952
        ]);

        Product::create([
            'brand_id'          => 5,
            'time_period_id'    => 2,
            'name'              => 'Schaal',
            'price'             => 70,
            'stock'             => 2,
            'design_year'       => 1960,
            'production_year'   => 1962
        ]);

        Product::create([
            'brand_id'          => 5,
            'time_period_id'    => 2,
            'name'              => 'Koffiekan',
            'price'             => 70,
            'stock'             => 2,
            'design_year'       => 1960,
            'production_year'   => 1962
        ]);

        Product::create([
            'brand_id'          => 5,
            'time_period_id'    => 2,
            'name'              => 'Groot bord',
            'price'             => 70,
            'stock'             => 2,
            'design_year'       => 1960,
            'production_year'   => 1962
        ]);
    }
}


