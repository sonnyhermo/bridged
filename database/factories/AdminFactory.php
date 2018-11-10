<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'middlename' => $faker->lastName,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('password'), // secret
        'remember_token' => str_random(10),
    ];
});
