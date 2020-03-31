<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'post_body' => $faker->realText(500),
        'user_id' => function () {
            return App\User::inRandomOrder()->first()->id;
        }
    ];
});
