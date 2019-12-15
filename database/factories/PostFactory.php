<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //
        "thread_id" => $faker->numberBetween(1,100),
        "user_id" => $faker->numberBetween(1,10),
        "content" => $faker->paragraph(4),
    ];
});
