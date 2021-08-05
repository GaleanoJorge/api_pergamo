<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'status_id' => $faker->numberBetween(1, 2),
        'gender_id' => $faker->numberBetween(1, 3),
        'academic_level_id' => $faker->numberBetween(1, 13),
        'identification_type_id' => $faker->numberBetween(1, 11),
        'birthplace_municipality_id' => 1,
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'firstname' => $faker->firstName,
        'middlefirstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'middlelastname' => $faker->lastName,
        'identification' => $faker->numberBetween(1, 1111111111),
    ];
});
