<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Thread;
use Faker\Generator as Faker;

$factory->define(Thread::class, function (Faker $faker) {
    $RandIsnull = $faker -> numberBetween(1,10);
    $parent_id = $RandIsnull == 1 ? null : $faker->numberBetween(1,100);
    return [
        //
        "owner_name" => $faker->name,
        "parent_id" => $parent_id,
        "title" => $faker -> sentence(10),
        "description" => $faker -> sentence(40)

    ];
});
