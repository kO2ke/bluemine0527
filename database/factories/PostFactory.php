<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //
        "thread_id" => $faker->numberBetween(1,100),
        "content" => $faker->paragraph(4),
        "owner_name" => $faker->name,
    ];
});
