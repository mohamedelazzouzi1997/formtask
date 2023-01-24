<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'firstName' => $this->faker->name(),
                'lastName' => $this->faker->name(),
                'email' => $this->faker->safeEmail(),
                'dateOfBirth' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                'phone' => $this->faker->e164PhoneNumber(),
                'country' => $this->faker->country(),
                'city' => $this->faker->city(),
                'referal' => $this->faker->randomElement($array = array ('Instagrame','Facebook','Twitter')),
                'created_at' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
                'is_confirmed' => 0,
        ];
    }
}
