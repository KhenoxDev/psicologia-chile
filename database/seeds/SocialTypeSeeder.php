<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialTypeSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	const SOCIAL_TYPE = [
		'Facebook',
		'Instagram',
		'Twitter',
		'Youtube',
		'Whatsapp',
		'Linkedin'
	];

	public function run()
	{
		for ($i = 0; $i < count(self::SOCIAL_TYPE); $i++) {
			DB::table('social_type')->insert([
				'name' => self::SOCIAL_TYPE[$i],
			]);
		}
	}
}
