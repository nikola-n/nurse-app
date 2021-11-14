<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->name,
            'email'         => $this->faker->email,
            'gender'        => $this->faker->shuffleArray([Patient::GENDER_FEMALE, Patient::GENDER_MALE])[0],
            'phone'         => $this->faker->phoneNumber,
            'date_of_birth' => $this->faker->date,
        ];
    }
}
