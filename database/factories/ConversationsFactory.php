<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\conversations;
use Faker\Generator as Faker;

$factory->define(conversations::class, function (Faker $faker) {
    return [
        'messages' => $faker->sentence('5'),
        'receiver_id' => $faker->numberBetween(1, 3),
        'sender_id' => $faker->numberBetween(3, 6)
    ];

});
