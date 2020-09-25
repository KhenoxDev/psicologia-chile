<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */

	const MODULES = [
		'Logo',
		'Video',
		'Banner',
		'Socials',
		'Popup',
		'OwnBusiness'
	];

	public function run()
	{
		for ($i = 0; $i < count(self::MODULES); $i++) {
			DB::table('module')->insert([
				'module' => self::MODULES[$i],
			]);
		}
	}
}
