<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

/**
 * php artisan make:factory BlogPostFactory
 */

use App\Models\BlogCategoryPost;
use Faker\Generator as Faker;

$factory->define(BlogCategoryPost::class, function (Faker $faker) {
    $data = [
        'category_id' => rand(1, 11),
        'post_id' => rand(1, 100),
    ];

    return $data;
});
