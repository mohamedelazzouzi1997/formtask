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
        \App\Models\User::create([
            'name' => 'ecdtest admin',
            'email' => 'test@test.com',
            'password' => \bcrypt('123456789'),
        ]);
    }
}
//
