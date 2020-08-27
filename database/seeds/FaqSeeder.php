<?php

use App\FrequentlyQuestion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FaqSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->questions = new FrequentlyQuestion();
	}

	const FREQ_QUESTIONS = [
		[
			'title' => '¿Cómo es una terapia psicológica?',
			'answer' => 'La terapia psicológica  es el conjunto de técnicas y procesos que lleva a cabo un psicólogo  hacia el paciente, con el objetivo de mejorar la calidad de vida de éste, mediante una modificación de su conducta, pensamientos, actitudes o afectos que pudieran estar malestar o padecimiento.'
		],
		[
			'title' => '¿Qué debo esperar de una terapia psicológica?',
			'answer' => 'A modo general, hay dos cosas que puedes esperar de acudir a terapia psicológica, cambiar, y crecer, cosas como sentir más seguridad, mejorar tus relaciones, mejorar el control de tus acciones y emociones son lo más común que se logra cuando terapeuta y paciente logran un buen equipo terapéutico.'
		],
		[
			'title' => '¿Que es la terapia psicológica online?',
			'answer' => 'La terapia psicológica On line es igual a una terapia tradicional con la diferencia que se hace por medio de una plataforma remota de comunicación, (video conferencia)  '
		],
		[
			'title' => '¿Cuáles son las principales virtudes de terapia online?',
			'answer' => '- Atenderse con un psicólogo deseado, desde cualquier parte sin importar ubicación geográfica, siempre que tenga una conexión a internet. <br />
- Ahorro de tiempo en traslado, filas para compras de bonos, esperas, etc.<br />
- Mayor disponibilidad horaria.<br />
- Disminución de costos.<br />
'
		],
		[
			'title' => '¿Qué distingue a psicología chile como plataforma de atención?',
			'answer' => 'Somos una plataforma que ofrece la más amplia variedad de especialidades de psicología.<br />
Disponemos de distintos medios de pago. No estamos enfocados en ningún nicho específico, entendemos que la psicología es transversal, no importando clases social ni poder adquisitivo.
'
		],
		[
			'title' => '¿Cómo se asegura la confidencialidad en cada sesión?',
			'answer' => 'Nuestras terapias se desarrollan bajo estrictas normas de seguridad informática, donde poseemos nuestra propia plataforma en la cual se desarrollan cada sesión. No existen grabaciones de las videoconferencias entre pacientes y profesionales en nuestros servidores, los cuales están encriptados y se hace constante respaldo de las bases de datos.'
		],
		[
			'title' => '¿Cómo me puedo atender con un psicólogo de psicología chile?',
			'answer' => 'Debes dirigirte al home de <strong>www.psicologiachile.cl</strong> pinchar el boto de <strong>Comienza Ya</strong> y completar tus datos, una vez completado seleccionas al psicólogo, verificas su disponibilidad horaria, ¡seleccionas la fecha y hora de atención, y listo! '
		],
		[
			'title' => '¿En qué consiste la primera sesión, la cual es costo cero?',
			'answer' => 'La primera sesión es gratuita, con la finalidad de que pruebes este nuevo sistema con psicólogos adheridos a esta primera sesión gratis. Es importante destacar que la primera sesión gratis es validad para la primera sesión del paciente.'
		],
		[
			'title' => '¿Me puedo atender utilizando Fonasa o Isapre?',
			'answer' => 'Si, te puedes atender en cualquier previsión, siempre que el profesional que escojas, para seguir una terapia o sesión, se encuentren adheridos a estas. Puedes revisar en los perfiles de los profesionales en que previsión se encuentras habilitados.'
		],
		[
			'title' => '¿Después de realizar el pago, como recibo la boleta?',
			'answer' => 'La boleta te la enviamos vía correo electrónico (este correo corresponde al con el que se hizo el registro del perfil en la plataforma)  posterior a cada sesión en un plazo máximo de 5 días. '
		],
		[
			'title' => '¿Dónde o porque medio me puedo contactar con psicología Chile?',
			'answer' => 'Nos puedes contactar al teléfono de soporte al número <strong>228693330</strong> el cual atiende de 8:00 a 22:00 Horas de lunes a domingo o vía correo electrónico a <strong>contacto@psicologiachile.cl</strong>'
		],
	];

	public function run()
	{
		for ($i = 0; $i < count(self::FREQ_QUESTIONS); $i++) {
			DB::table('frequently_question')->insert([
				'title' => self::FREQ_QUESTIONS[$i]['title'],
				'answer' => self::FREQ_QUESTIONS[$i]['answer'],
			]);
		}
	}
}
