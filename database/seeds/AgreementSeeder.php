<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
			"img" => "img/covenants/banco_chile3.png",
			"description" => "El descuento para clientes y socios del Banco de Chile es a partir de Julio de 2020,
							con una vigencia de 12 meses, sin perjuicio al término anticipado por una de las
							partes mediante carta escrita con al menos 1 mes de anticipación, renovable
							automáticamente.",
			"conditions" => "Los clientes Banco de Chile podrán acceder a los beneficios y/o descuentos
							preferenciales a través de los medios que Banco de Chile estime convenientes.
							Banco de Chile emitirá un código de descuento el cual se podrá hacer efectivo solo
							y únicamente en la plataforma www.psicologiachile.cl, para atención psicológica
							en modalidad online.",
			"doc" => "/docs/termino-y-condiciones-convenio-banco-de-chile.pdf"
		],
		[
			"title" => "Banco Itaú",
			"img" => "img/covenants/banco_itau3.png",
			"description" => "El descuento para clientes y socios del Banco Itaú es a partir de Julio de 2020, con
							una vigencia de 12 meses, sin perjuicio al término anticipado por una de las partes
							mediante carta escrita con al menos 1 mes de anticipación, renovable
							automáticamente.",
			"conditions" => "Los clientes Banco Itaú podrán acceder a los beneficios y/o descuentos
							preferenciales a través de los medios que Banco Itaú estime convenientes. Para
							acceder al descuento, se debe ingresar los primeros 6 dígitos de la tarjeta de Banco
							Itaú únicamente en la plataforma www.psicologiachile.cl, para atención
							psicológica en modalidad online.",
			"doc" => "/docs/termino-y-condiciones-convenio-banco-itau.pdf"
		],
		[
			"title" => "Banco Security",
			"img" => "img/covenants/banco_security.jpg",
			"description" => "El descuento para clientes Banco Security comienza el 1 de julio de 2020, con una
							vigencia de doce meses, sin perjuicio al término anticipado por una de las partes
							mediante carta escrita con al menos un mes de anticipación, renovable
							automáticamente.",
			"conditions" => "Los clientes de Banco Security podrán acceder a los beneficios y/o descuentos
							preferenciales a través del club de descuentos Banco Security, servicio de
							mensajería y/o a través de los medios que Banco Security estime convenientes.
							Para acceder al descuento, se debe ingresar los primeros 6 dígitos de la tarjeta de
							Banco Itaú únicamente en la plataforma www.psicologiachile.cl, para atención
							psicológica en modalidad online.",
			"doc" => "/docs/termino-y-condiciones-convenio-banco-security.pdf"
		],
		[
			"title" => "Claro",
			"img" => "img/covenants/claro.png",
			"description" => "El descuento para clientes y socios del Club Claro es a partir de junio de 2020, con
							una vigencia de 12 meses, sin perjuicio al término anticipado por una de las partes
							mediante carta escrita con al menos 1 mes de anticipación, renovable
							automáticamente.",
			"conditions" => "Los clientes Claro podrán acceder a los beneficios y/o descuentos preferenciales a
							través de la aplicación de Claro, servicio de mensajería y/o a través de los medios
							que Claro estime convenientes. Claro emitirá un código promocional desde MI
							CLARO APP o enviando un SMS al 2582 con la palabra “PSICOLOGIA” el cual se
							podrá hacer efectivo solo y únicamente en la plataforma www.psicologiachile.cl,
							para atención psicológica en modalidad online.",
			"doc" => "/docs/termino-y-condiciones-convenio-claro.pdf"
		],
		[
			"title" => "FLSmidth",
			"img" => "img/covenants/fldsmith.png",
			"description" => "El descuento para clientes y socios del FLSmidth es a partir de julio de 2020, con
							una vigencia de 12 meses, sin perjuicio al término anticipado por una de las partes
							mediante carta escrita con al menos 1 mes de anticipación, renovable
							automáticamente.",
			"conditions" => "Los clientes FLSmidth podrán acceder a los beneficios y/o descuentos
							preferenciales a través de los medios que FLSmidth estime convenientes.
							FLSmidth emitirá un código de descuento el cual se podrá hacer efectivo solo y
							únicamente en la plataforma www.psicologiachile.cl, para atención psicológica en
							modalidad online.",
			"doc" => "/docs/termino-y-condiciones-convenio-flsmidth.pdf"
		],
		[
			"title" => "GO Integro",
			"img" => "img/covenants/go-integro.png",
			"description" => "El descuento para beneficiarios de Go Integro es a partir de agosto de 2020, con
							una vigencia de 12 meses, sin perjuicio al término anticipado por una de las partes
							mediante carta escrita con al menos 1 mes de anticipación, renovable
							automáticamente.",
			"conditions" => "Los beneficiarios de Go Integro podrán acceder a los beneficios y/o descuentos
							preferenciales a través de los medios que Go Integro estime convenientes. El
							beneficiario deberá ingresar el código “EMPRESAS-GOBENEFITS” el cual se
							podrá hacer efectivo solo y únicamente en la plataforma www.psicologiachile.cl,
							para atención psicológica en modalidad online.",
			"doc" => "/docs/termino-y-condiciones-convenio-go-integro.pdf"
		],
		[
			"title" => "Mundo ACHS",
			"img" => "img/covenants/achs3.png",
			"description" => "El descuento para clientes y socios del Mundo ACHS es a partir de agosto de 2020,
							con una vigencia de 12 meses, sin perjuicio al término anticipado por una de las
							partes mediante carta escrita con al menos 1 mes de anticipación, renovable
							automáticamente.",
			"conditions" => "Los clientes Mundo ACHS podrán acceder a los beneficios y/o descuentos
							preferenciales a través de los medios que Mundo ACHS estime convenientes. Para
							hacer uso del beneficio se debe utilizar el código “MUNDOACHS”, el cual se podrá
							hacer efectivo solo y únicamente en la plataforma www.psicologiachile.cl, para
							atención psicológica en modalidad online.",
			"doc" => "/docs/termino-y-condiciones-convenio-mundo-achs.pdf"
		],
		[
			"title" => "Sky Airlines",
			"img" => "img/covenants/sky.png",
			"description" => "El descuento para clientes y socios de Sky Airlines es a partir de agosto de 2020,
							con una vigencia de 12 meses, sin perjuicio al término anticipado por una de las
							partes mediante carta escrita con al menos 1 mes de anticipación, renovable
							automáticamente.",
			"conditions" => "Los clientes Sky Airlines podrán acceder a los beneficios y/o descuentos
							preferenciales a través de los medios que Sky Airlines estime convenientes. Sky
							Airlines emitirá un código de descuento el cual se podrá hacer efectivo solo y
							únicamente en la plataforma www.psicologiachile.cl, para atención psicológica en
							modalidad online.",
			"doc" => "/docs/termino-y-condiciones-convenio-sky-airlines.pdf"
		],
		[
			"title" => "Caja Los Héroes",
			"img" => "img/covenants/caja-los-heroes.png",
			"description" => "El descuento para clientes y afiliados del caja los Herores es a partir de
							Septiembre de 2020, con una vigencia de 12 meses, sin perjuicio al término
							anticipado por una de las partes mediante carta escrita con al menos 1 mes de
							anticipación, renovable automáticamente.",
			"conditions" => "Los afiliados Caja Los Heroes podrán acceder a los beneficios y/o descuentos
							preferenciales a través de los medios que Caja Los Herores estime convenientes.
							Para acceder al descuento, se debe ingresar el rut sin guion únicamente en la
							plataforma www.psicologiachile.cl, para atención psicológica en modalidad
							online.",
			"doc" => "/docs/termino-y-condiciones-convenio-caja-los-heroes.pdf"
		],
		[
			"title" => "Coca-Cola Andina",
			"img" => "img/covenants/coca-cola.png",
			"description" => "El descuento para clientes y afiliados del Ko Andina es a partir de Septiembre de
							2020, con una vigencia de 12 meses, sin perjuicio al término anticipado por una de
							las partes mediante carta escrita con al menos 1 mes de anticipación, renovable
							automáticamente.",
			"conditions" => "Los afiliados Ko Andina podrán acceder a los beneficios y/o descuentos
							preferenciales a través de los medios que Ko Andina estime convenientes. Para
							acceder al descuento, se debe ingresar el código PSICOLOGIAANDINACHILE
							únicamente en la plataforma www.psicologiachile.cl, para atención psicológica
							en modalidad online.",
			"doc" => "/docs/termino-y-condiciones-convenio-ko-andina.pdf"
		],
	];

	public function run()
	{
		for ($i = 0; $i < count(self::AGREEMENT); $i++) {
			DB::table('agreements')->insert([
				'title' => self::AGREEMENT[$i]['title'],
				'description' => self::AGREEMENT[$i]['description'],
				'conditions' => self::AGREEMENT[$i]['conditions'],
				'img' => self::AGREEMENT[$i]['img'],
				'doc' => self::AGREEMENT[$i]['doc'],
			]);
		}
	}
}
