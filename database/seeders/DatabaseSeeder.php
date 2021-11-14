<?php

namespace Database\Seeders;

use App\Models\BloodPressureReading;
use App\Models\Patient;
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
        BloodPressureReading::factory(50000)->create();
    }
}
