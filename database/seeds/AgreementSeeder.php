<?php

use Illuminate\Database\Seeder;

class AgreementSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	const AGREEMENT = [
		[
			"title" => "Banco de Chile",
			"description" => "El descuento para clientes y socios del Banco de Chile es a partir de Julio de 2020,
							con una vigencia de 12 meses, sin perjuicio al término anticipado por una de las
							partes mediante carta escrita con al menos 1 mes de anticipación, renovable
							automáticamente.",
			"conditions" => "Los clientes Banco de Chile podrán acceder a los beneficios y/o descuentos
							preferenciales a través de los medios que Banco de Chile estime convenientes.
							Banco de Chile emitirá un código de descuento el cual se podrá hacer efectivo solo
							y únicamente en la plataforma www.psicologiachile.cl, para atención psicológica
							en modalidad online.",
			"doc" => ""
		],
		[
			"title" => "Banco Itaú",
			"description" => "",
			"conditions" => "",
			"doc" => ""
		],
		[
			"title" => "Banco Security",
			"description" => "",
			"conditions" => "",
			"doc" => ""
		],
		[
			"title" => "Claro",
			"description" => "",
			"conditions" => "",
			"doc" => ""
		],
		[
			"title" => "FLSmidth",
			"description" => "El descuento para clientes y socios del FLSmidth es a partir de julio de 2020, con
							una vigencia de 12 meses, sin perjuicio al término anticipado por una de las partes
							mediante carta escrita con al menos 1 mes de anticipación, renovable
							automáticamente.",
			"conditions" => "Los clientes FLSmidth podrán acceder a los beneficios y/o descuentos
							preferenciales a través de los medios que FLSmidth estime convenientes.
							FLSmidth emitirá un código de descuento el cual se podrá hacer efectivo solo y
							únicamente en la plataforma www.psicologiachile.cl, para atención psicológica en
							modalidad online.",
			"doc" => ""
		],
		[
			"title" => "GO Integro",
			"description" => "",
			"conditions" => "",
			"doc" => ""
		],
		[
			"title" => "Mundo ACHS",
			"description" => "",
			"conditions" => "",
			"doc" => ""
		],
		[
			"title" => "Sky",
			"description" => "",
			"conditions" => "",
			"doc" => ""
		],
		[
			"title" => "Caja Los Héroes",
			"description" => "",
			"conditions" => "",
			"doc" => ""
		],
		[
			"title" => "Coca-Cola Andina",
			"description" => "",
			"conditions" => "",
			"doc" => ""
		],
	];

	public function run()
	{
	}
}
