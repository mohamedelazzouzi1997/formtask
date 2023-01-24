<?php

namespace Database\Seeders;

use App\Models\Form;
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
        Form::create([
            'firstName' => $this->faker->name(),
            'lastName' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'dateOfBirth' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'phone' => $this->faker->e164PhoneNumber(),
            'country' => $this->faker->country(),
            'city' => $this->faker->city(),
            'referal' => $this->faker->unique()->safeEmail(),
        ]);
    }
}
//
