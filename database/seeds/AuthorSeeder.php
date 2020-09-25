<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('author')->insert([
			'name' => 'Psicólogo',
			'image' => '/img/news/anonimo.png',
		]);
	}
}
