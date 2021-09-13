<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name'  => 'Iittala',
            'line'  => 'Teema'
        ]);

        Brand::create([
            'name'  => 'Iittala',
            'line'  => 'Ultima Thule'
        ]);

        Brand::create([
            'name'  => 'Arabia',
            'line'  => 'Artica'
        ]);

        Brand::create([
            'name'  => 'Arabia',
            'line'  => 'Lumi'
        ]);

        Brand::create([
            'name'  => 'Marimekko',
        ]);
    }
}
