<?php

use Faker\Generator as Faker;

$factory->define(App\Room::class, function (Faker $faker) {

    $hostel_id = \App\Hostel::pluck('id');

    return [
        //

        'hostel_id'=>$faker->randomElement($hostel_id),

        'capacity' => $faker->randomElement(['2','3','5','10']),
        'status'=>$faker->boolean,
        'fan'=>$faker->boolean,
        'ac'=>$faker->boolean,
        'furnished'=>$faker->boolean,
    ];
});
