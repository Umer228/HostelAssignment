<?php

use Faker\Generator as Faker;

$factory->define(App\Hostel::class, function (Faker $faker) {
    return [
        //

        'name' => $faker->name,
        'phone'=>$faker->randomNumber(),
        'address'=>$faker->address,

    ];
});
