<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	const ROLES = [
		[
			'name' => 'Administrador',
			'description' => 'El Dios de la plataforma'
		],
		[
			'name' => 'Operador',
			'description' => 'Puede ingresar a todos los mantenedores de la plataforma'
		],
		[
			'name' => 'Editor',
			'description' => 'Puede crear, modificar y dar de baja: Noticias, Preguntas'
		],
	];

	public function run()
	{
		for ($i = 0; $i < count(self::ROLES); $i++) {
			DB::table('rol')->insert([
				'name' => self::ROLES[$i]['name'],
				'description' => self::ROLES[$i]['description'],
			]);
		}
	}
}
