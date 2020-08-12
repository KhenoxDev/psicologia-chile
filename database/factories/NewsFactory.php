<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(News::class, function (Faker $faker) {
	return [
		'title' => $faker->sentence(6),
		'autor' => $faker->name,
		'content' => $faker->realText(200),
		'image' => $faker->imageUrl,
		'is_posted' => $faker->boolean,
		'posted_on' => $faker->dateTime('now'),
		'updated_by' => $faker->name,
		'created_at' => $faker->dateTime('now'),
		'updated_at' => $faker->dateTime('now'),
	];
});
