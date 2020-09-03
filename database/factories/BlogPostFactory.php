<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\BlogPost::class, function (Faker $faker) {

    $title = $faker->sentence(rand(3, 8), true);
    $text = $faker->realText(rand(1000, 4000));
    $isPublished = rand(1, 5) > 1;

    $publishedAt = $faker->dateTimeBetween('-2 months', '-1 days');
    $createdAt = $faker->dateTimeBetween('-3 months', $publishedAt);

    $data = [
        'category_id'  => rand(1, 11),
        'user_id'      => (rand(1, 5) == 5) ? 1 : 2,
        'title'        => $title,
        'slug'         => str_slug($title),
        'excerpt'      => $faker->text(rand(40, 100)),
        'content_raw'  => $text,
        'content_html' => $text,
        'is_published' => $isPublished,
        'published_at' => $isPublished ? $publishedAt : null,
        'created_at'   => $createdAt,
        'updated_at'   => $createdAt,
    ];


    return $data;
});
