<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\State;
use Faker\Generator as Faker;

$factory->define(State::class, function (Faker $faker) {
    $states = [
        'U obradi',
        'U najavi',
        'Obrađeno',
        'Otkazano',
    ];
    return [
        'state' => $states[rand(0, count($states) - 1)],
    ];
});
