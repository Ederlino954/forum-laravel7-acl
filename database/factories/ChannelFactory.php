<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Channel;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Channel::class, function (Faker $faker) {

    $name = $faker->sentence;

    return [
        'name' => $name,
        'description' => $faker->sentence,
        'slug' => Str::slug($name)
    ];
});
