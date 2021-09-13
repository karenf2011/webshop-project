<?php

namespace Database\Seeders;

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
        $this->call(RolesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TimePeriodSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductCategoriesSeeder::class);

        \App\Models\Address::factory(5)->create();
    }
}
