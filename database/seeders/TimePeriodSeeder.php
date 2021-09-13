<?php

namespace Database\Seeders;

use App\Models\TimePeriod;
use Illuminate\Database\Seeder;

class TimePeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TimePeriod::create([
            'name'  => "Jaren '50"
        ]);

        TimePeriod::create([
            'name'  => "Jaren '60"
        ]);

        TimePeriod::create([
            'name'  => "Jaren '70"
        ]);

        TimePeriod::create([
            'name'  => "Jaren '80"
        ]);

        TimePeriod::create([
            'name'  => "Jaren '90"
        ]);

        TimePeriod::create([
            'name'  => "na 2000"
        ]);
    }
}
