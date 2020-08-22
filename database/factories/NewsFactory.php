<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(News::class, function (Faker $faker) {
	return [
		'title' => $faker->sentence(6),
		'author' => $faker->name,
		'author_image' => $faker->imageUrl,
		'content' => $faker->realText(200),
		'image' => $faker->imageUrl,
		'is_posted' => $faker->boolean,
		'posted_on' => Carbon::now(),
		'updated_by' => $faker->name,
		'created_at' => Carbon::now(),
		'updated_at' => Carbon::now(),
	];
});
