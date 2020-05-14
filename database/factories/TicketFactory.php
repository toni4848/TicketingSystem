<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'body' => $faker->text,
        'user_id' => factory(\App\User::class),
        'state_id' => factory(\App\State::class),
        'client_id' => factory(\App\Client::class),
    ];
});
