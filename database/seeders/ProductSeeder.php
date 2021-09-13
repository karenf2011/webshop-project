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
            'slug'              => 'ittala-teema-kopje',
            'price'             => 23,
            'stock'             => 3,
            'design_year'       => 1970,
            'production_year'   => 1972
        ]);

        Product::create([
            'brand_id'          => 1,
            'time_period_id'    => 3,
            'name'              => 'Klein bord',
            'slug'              => 'ittala-teema-klein-bord',
            'price'             => 15,
            'stock'             => 2,
            'design_year'       => 1970,
            'production_year'   => 1972
        ]);

        Product::create([
            'brand_id'          => 1,
            'time_period_id'    => 3,
            'name'              => 'Koffiekan',
            'slug'              => 'ittala-teema-koffiekan',
            'price'             => 60,
            'stock'             => 1,
            'design_year'       => 1970,
            'production_year'   => 1972
        ]);

        Product::create([
            'brand_id'          => 2,
            'time_period_id'    => 4,
            'name'              => 'Kopje',
            'slug'              => 'ittala-ultima-thule-kopje',
            'price'             => 20,
            'stock'             => 3,
            'design_year'       => 1980,
            'production_year'   => 1982
        ]);

        Product::create([
            'brand_id'          => 2,
            'time_period_id'    => 4,
            'name'              => 'Klein bord',
            'slug'              => 'ittala-ultima-thule-klein-bord',
            'price'             => 18,
            'stock'             => 3,
            'design_year'       => 1980,
            'production_year'   => 1982
        ]);

        Product::create([
            'brand_id'          => 2,
            'time_period_id'    => 4,
            'name'              => 'Drinkglas',
            'slug'              => 'ittala-ultima-thule-drinkglas',
            'price'             => 20,
            'stock'             => 3,
            'design_year'       => 1980,
            'production_year'   => 1982
        ]);

        Product::create([
            'brand_id'          => 3,
            'time_period_id'    => 4,
            'name'              => 'Klein bord',
            'slug'              => 'arabia-artica-klein-bord',
            'price'             => 30,
            'stock'             => 2,
            'design_year'       => 1980,
            'production_year'   => 1982
        ]);

        Product::create([
            'brand_id'          => 3,
            'time_period_id'    => 4,
            'name'              => 'Ovenschaal',
            'slug'              => 'arabia-artica-ovenschaal',
            'price'             => 100,
            'stock'             => 2,
            'design_year'       => 1980,
            'production_year'   => 1982
        ]);

        Product::create([
            'brand_id'          => 3,
            'time_period_id'    => 4,
            'name'              => 'Siervogel',
            'slug'              => 'arabia-artica-siervogel',
            'price'             => 150,
            'stock'             => 1,
            'design_year'       => 1980,
            'production_year'   => 1982
        ]);

        Product::create([
            'brand_id'          => 4,
            'time_period_id'    => 1,
            'name'              => 'Bord',
            'slug'              => 'arabia-lumi-bord',
            'price'             => 70,
            'stock'             => 4,
            'design_year'       => 1950,
            'production_year'   => 1952
        ]);

        Product::create([
            'brand_id'          => 4,
            'time_period_id'    => 1,
            'name'              => 'Schaal',
            'slug'              => 'arabia-lumi-schaal',
            'price'             => 70,
            'stock'             => 4,
            'design_year'       => 1950,
            'production_year'   => 1952
        ]);

        Product::create([
            'brand_id'          => 4,
            'time_period_id'    => 1,
            'name'              => 'Bakje',
            'slug'              => 'arabia-lumi-bakje',
            'price'             => 30,
            'stock'             => 4,
            'design_year'       => 1950,
            'production_year'   => 1952
        ]);

        Product::create([
            'brand_id'          => 5,
            'time_period_id'    => 2,
            'name'              => 'Schaal',
            'slug'              => 'marimekko-schaal',
            'price'             => 70,
            'stock'             => 2,
            'design_year'       => 1960,
            'production_year'   => 1962
        ]);

        Product::create([
            'brand_id'          => 5,
            'time_period_id'    => 2,
            'name'              => 'Koffiekan',
            'slug'              => 'marimekko-koffiekan',
            'price'             => 70,
            'stock'             => 2,
            'design_year'       => 1960,
            'production_year'   => 1962
        ]);

        Product::create([
            'brand_id'          => 5,
            'time_period_id'    => 2,
            'name'              => 'Groot bord',
            'slug'              => 'marimekko-groot-bord',
            'price'             => 70,
            'stock'             => 2,
            'design_year'       => 1960,
            'production_year'   => 1962
        ]);
    }
}


