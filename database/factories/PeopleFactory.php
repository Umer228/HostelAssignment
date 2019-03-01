<?php

use Faker\Generator as Faker;

$factory->define(App\People::class, function (Faker $faker) {

    $hostel_id = \App\Hostel::pluck('id');
    $room_id = \App\Room::pluck('id');

    return [



        //
        'hostel_id'=>$faker->randomElement($hostel_id),
        'room_id'=>$faker->randomElement($room_id),
        'name' => $faker->name,
        'cnic'=>$faker->randomDigit,
        'address'=>$faker->address,

    ];
});
