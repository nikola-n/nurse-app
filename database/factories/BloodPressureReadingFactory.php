<?php

namespace Database\Factories;

use App\Models\BloodPressureReading;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class BloodPressureReadingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id'         => Patient::factory(),
            'status'             => $this->faker->shuffleArray(BloodPressureReading::STATUSES)[0],
            'systolic_pressure'  => $this->faker->numberBetween(100, 180),
            'diastolic_pressure' => $this->faker->numberBetween(70, 130),
            'measured_at'        => now(),
        ];
    }
}
