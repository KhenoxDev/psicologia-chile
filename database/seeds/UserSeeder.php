<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('user')->insert([
			'rut' => '1-9',
			'name' => 'Super',
			'last_name' => 'Administrador',
			'password' => Hash::make('123'),
			'is_active' => 1,
			'rol_id' => 1,
		]);
	}
}
