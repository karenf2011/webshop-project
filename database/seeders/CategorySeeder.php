<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'  => 'Uitgelicht'
        ]);

        Category::create([
            'name'  => 'Glaswerk'
        ]);

        Category::create([
            'name'  => 'Keramiek'
        ]);

        Category::create([
            'name'  => 'Servies'
        ]);

        Category::create([
            'name'  => 'Sierobjecten'
        ]);
    }
}
