<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call([FaqSeeder::class, RolSeeder::class, UserSeeder::class, SocialTypeSeeder::class, AuthorSeeder::class, NewsSeeder::class]);
	}
}
