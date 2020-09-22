<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NewsSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */

	const NEWS_DATA = [
		[
			'title' => 'Por un equilibrio mental en tiempos de pandemia',
			'author_id' => 1,
			'content' => '<strong> Si bien es de suma relevancia respetar las medidas sanitarias para recuperar la
						salud física, también es importante concentrar los esfuerzos en la salud mental. </strong>
						<br><br>
						Llevamos casi tres meses de aislamiento, de autoconfinamiento, usando mascarillas para
						realizar trámites en las calles, lavándonos las manos de manera constante, sin dar
						abrazos ni compartir con nuestros seres queridos de forma cercana, es decir, la vida
						como la conocíamos ya no es la misma, ni será la misma.
						<br><br>
						Este cambio ha aumentado el nivel de stress de la población mundial. Adultos, jóvenes y
						niños han tenido que adaptarse al teletrabajo y estudio online, transformando la distancia
						física en un acercamiento virtual, donde la imagen (no nosotros) lo es todo.
						<br><br>
						Si bien es de suma relevancia respetar las medidas sanitarias para recuperar la salud
						física, también es importante concentrar los esfuerzos en la salud mental. Varios estudios
						avalan a las artes y, en especial, a la música como una terapia efectiva al momento de
						cuidar nuestras emociones, la ansiedad y niveles de frustración, que en este tiempo de
						aislamiento son fuertes murallas mentales.
						<br><br>
						Se ha confirmado que practicar y/o escuchar música está, fuertemente relacionado con la
						liberación de oxitocina y dopamina, químicos que generan una sensación de bienestar en
						el cuerpo. También, tiene efectos en el sistema límbico y puede producir cambios
						fisiológicos, por lo que la musicoterapia es utilizada en la recuperación de pacientes de
						trauma, entre otros.
						<br><br>
						Los especialistas han detectado que las reacciones que se observan en el cerebro
						cuando se escucha música atentamente, se asimilan a ‘fuegos artificiales’ varias zonas
						se iluminan. El mundo de la música conoce bien esta relación.
						<br><br>
						Asimismo, los músicos han demostrado la importancia de mantenerse activos en el área,
						con constantes ensayos a distancia, estudiando sus instrumentos en sus casas y creando
						nuevas composiciones, pues consideran, de forma correcta, que su labor se asimila a la
						de un deportista de elite.',
			'image' => '/img/news/news_piedras.png',
			'posted_on' => '2020-06-11',
		],

		[
			'title' => 'Expertos advierten una ola de trastornos postpandemia',
			'author_id' => 1,
			'content' => 'ANÁLISIS DE INVESTIGADORES DE LATINOAMÉRICA Y ESPAÑA
						<br><br>
						Los segmentos más propensos al estrés y la depresión, detallan, son los adultos mayores y los trabajadores de la salud. Más de mil profesionales tuvieron un encuentro virtual y coincidieron en que el impacto del covid-19 no tiene precedentes.
						<br><br>
						Expertos en salud mental de Latinoamérica y España advierten de la posibilidad de que se produzca una ola de trastornos como ansiedad, depresión y estrés e incluso suicidios a consecuencia de la pandemia del covid-19 e instan a especialistas y ciudadanos a estar vigilantes para poder contenerla a tiempo.
						<br><br>
						La atención debe ser aún mayor en el caso de las poblaciones vulnerables ante estos trastornos, como son las conformadas por adultos mayores y los trabajadores de la salud que se encuentran al frente de la batalla contra el covid-19, señalan. Esas son las principales conclusiones de un encuentro virtual de más de mil profesionales de la salud de distintas áreas terapéuticas y de todos los países de la región convocado por Janssen, el grupo de compañías farmacéuticas de Johnson & Johnson, para abordar el tema “Salud mental en tiempos de pandemia”.
						<br><br>
						Como destacó el psiquiatra brasileño Humberto Corréa en ese evento, si bien esta no es la primera vez que la humanidad se enfrenta a una pandemia y al aislamiento social, síes la primera de ámbito mundial y por un período mayor a 21 días.
						<br><br>
						UN DESAFÍO PARA EL ÁNIMO
						<br><br>
						Por eso mismo, constituye un “importante desafío para toda la población: pacientes, profesionales de la salud y la comunidad en su totalidad”, señaló Gabriela Kanevsky, gerente médico de Janssen Latinoamérica para el área de Neurociencias. “En ese marco creemos que es fundamental comprender su impacto y las consecuencias en el área de la salud mental”, expresó.
						<br><br>
						Además de Corréa intervinieron como ponentes los psiquiatras Rodrigo Córdoba, de Colombia; Marcelo Cetkovich, de Argentina, y Pedro M. Sánchez Gómez, de España. Los especialistas abordaron las principales consecuencias que el covid-19 y la prolongada cuarentena que gobiernos e instituciones han adoptado para contener su propagación van a tener en la salud mental a nivel mundial y para los latinoamericanos en particular.
						<br><br>
						Corréa, profesor de Psiquiatría en UFMG (Universidad Federal de Minas Gerais), se planteó si la humanidad está preparada para un impacto que “no tiene precedentes” y produce un “enorme sufrimiento psíquico” a causa del “padecimiento de la enfermedad, la muerte de familiares y amigos, el desempleo, la economía mundial, entre otros” factores.
						<br><br>
						LA CUARTA OLA
						<br><br>
						“Todo esto conlleva a estados de depresión, ansiedad, trastorno de estrés postraumático y el abuso de alcohol u otras sustancias. La tormenta perfecta que los expertos vislumbran será la próxima ola de la pandemia”, aseveró el presidente de la Asociación Brasileña de Estudios y Prevención del Suicidio y su equivalente latinoamericana. Corréa instó a los gobiernos, los profesionales de la salud mental y la sociedad en general a prepararse para esa “cuarta ola” y definir estrategias que permitan mitigar los efectos de la pandemia, especialmente en los grupos vulnerables.
						<br><br>
						El especialista colombiano Rodrigo Córdoba, director del departamento de Psiquiatría de la Universidad del Rosario, hizo hincapié e su intervención en la importancia de detectar a tiempo la depresión y la ansiedad. Para la depresión recomendó preguntar al paciente si “en el último mes se ha preocupado por sentirse deprimido o desesperanzado” o “preocupado por tener menos interés o placer en las cosas”.
						<br><br>
						“Prevenir es preguntar. La detección temprana es la mejor alternativa que tenemos. Si respondemos a estas preguntas, sin duda podríamos cambiar de manera significativa el futuro de estas personas y evitar el suicidio”, aseveró.
						<br><br>
						Córdoba hizo referencia a un estudio llamado “Depresión resistente al tratamiento en América Latina”, del cual participó y que se llevó a cabo en Latinoamérica sobre la prevalencia de la depresión resistente en Argentina, México Colombia y Brasil. El estudio mostró que tres de cada 10 pacientes con depresión mayor se vuelven resistentes al tratamiento, “Esto constituye otro reto que nos espera, por el alto costo asociado en términos personales, familiares y sociales”.
						<br><br>
						ESTRÉS POSTRAUMÁTICO
						<br><br>
						El argentino Marcelo Cetkovich, director médico de lneco (Instituto de Neurología Cognitiva), centró su ponencia en el estrés producido por “el impacto de la pandemia, los efectos negativos del aislamiento, el miedo, la preocupación financiera y, también, la angustia que generan las fake news’ o noticias que asustan a las personas”.
						<br><br>
						En el caso de los profesionales de la salud “en primera línea de combate de la pandemia” dijo que van a sufrir “una epidemia de síndrome de estrés postraumático” y es “necesario estar atentos y preparar a la población para esta situación”. Cetkovich puso al hospital Carlos III de Madrid como referencia para los países latinoamericanos por haber encargado a un grupo de psiquiatras la tarea de atender a los trabajadores de la salud del centro y ayudarlos a lidiar con el estrés y sus sentimientos.
						<br><br>
						El español Pedro M. Sánchez Gómez, del hospital psiquiátrico de Alava (Osakidetza) y profesor de la Universidad del País Vasco, destacó los obstáculos que encontraron en España en el momento álgido de la pandemia para tratar a pacientes con cuadros depresivos mayores en medio de la cuarentena. “Prácticamente tuvimos que reinventarnos y generar nuevos protocolos de atención para los pacientes con trastornos de salud mental, como por ejemplo el uso de la telemedicina, programas de prevención de hospitalizaciones, brindar asesoría a los cuidadores y familiares para que funcionaran como coterapeutas, e incluso hacer intervenciones domiciliarias”.',
			'image' => '/img/news/news_cerebro.jpeg',
			'posted_on' => '2020-06-09',
		],

		[
			'title' => 'El Lenguaje Humano',
			'author_id' => 1,
			'content' => 'El Lenguaje Humano
						<br><br>
						Rafael Echeverría describe a los Seres Humanos, como seres Lingüísticos, seres que viven en el Lenguaje.
						<br><br>
						Mencionamos tres dominios del ser humano, lenguaje emoción y cuerpo, y comienzo con una frase que me gusta mucho <strong> “El Lenguaje no es inocente, tiene Gran Poder Transformacional, El lenguaje crea Realidad”</strong>
						<br><br>
						El lenguaje tiene una relevancia superior sobre el cuerpo y la emoción, a través de la palabra podemos crear estados emociones expansivos y es una forma de dar Sentido  nuestras vidas.
						<br><br>
						Reflexiona sobre la siguiente Pregunta
						<br><br>
						¿Quién Eres?
						<br><br>
						Y lo que obtendrás inmediatamente es un Relato Lingüístico de cómo te percibes, Rafael Echeverría menciona, Nuestra identidad esta directamente asociada a nuestra capacidad de generar sentido a través de nuestros Relatos. Al Modificar el relato de quienes somos, modificamos nuestra identidad.
						<br><br>
						Entonces si haces un análisis de que te dices sobre quién eres en el Amor, ¿Qué surge? ¿Que parte de ese relato, te expande y cual no?, ¿qué le dices a tus Hijos, de ti, de otros?
						<br><br>
						Puedes hacer un ejercicio toma Lápiz y papel y busca las categorías de tu vida que en estos momentos no tienen los resultados que quieres, y escribe que te dices constantemente en esa categoría,  Relación de pareja, trabajo, profesión, amistades, familia, escoge la que tenga más relevancia para ti.
						<br><br>
						Si quieres cambiar los resultados es imperante saber que te dices, y luego descubrir porque te dices o te cuentas esa historia.
						<br><br>
						El primer paso de la Transformación, es hacer consciente aquello que no estas viendo.',
			'image' => '/img/news/news_lenguaje.png',
			'posted_on' => '2020-06-05',
		],

		[
			'title' => 'La Emocionalidad',
			'author_id' => 1,
			'content' => 'La Emocionalidad
						<br><br>
						¿Cuán relegada esta?
						<br><br>
						Desde la Mirada del coaching Ontológico distinguimos tres dominios importantes que constituyen al ser Humano, el Lenguaje, el  cuerpo y La Emoción, entre ellos se establecen relaciones de coherencia, que se condicionan entre uno y otro, estos condicionamientos derivan en quien  eres, en cómo te constituyes como ser Humano.
						<br><br>
						La percepción Emocional consiste en ser consciente de las propias emociones, estar en contacto con ellas, comprenderlas, aceptarlas y escucharlas.
						<br><br>
						Respira, y recuerda esa vez que estabas en el auto o en el bus, hacía calor, había mucha gente a tu alrededor, ¿Cómo estaba tu cuerpo? ¿Tenso?, ¿sudado?, ¿estabas temblando?, ¿Que sentías?       ¿Enfado? ¿Nerviosismo?, ¿Qué decías?, ahora imagina que estas en la playa, la arena tibia debajo de tus pies, la brisa suave acaricia tu piel, ¿Qué estas sintiendo? ¿Qué paso con tu Cuerpo? ¿Qué pensaste y dijiste?
						<br><br>
						Que quiere decir esto, si  queremos  entender una determinada emoción es importante vincularla con el acontecimiento que la desencadena, al hablar de emociones, hablamos que hay circunstancias particulares que las generan. Al identificarla sabremos que si queremos evitar la repetición de esa emoción  tendremos que eliminar o evitar los eventos que la originan, y si queremos que esa experiencia emotiva se repita tendremos que poner ese evento en tu vida las veces que decidas.
						<br><br>
						(Rafael Echeverría) El reconocimiento entre la emoción y el acontecimiento nos permite no solo una interpretación de los fenómenos emotivos, sino también posibilidades concretas de acción.
						<br><br>
						Entonces, presta continuamente atención a esto: que te hace feliz y que no
						<br><br>
						Encuentra esos momentos que te hacen sentir feliz, e incorpóralos continuamente en tu vida, diseña una estrategia y crea continuamente y de forma consciente las emociones que quieres sentir.
						<br><br>
						Define que te hace sentir dolor o frustración, averigua como aparecen estos sentimientos y emociones y evítalos o limita los eventos que los producen.
						<br><br>
						Escucha tus emociones, cuanto más intentes suprimir o evadir una emoción, más fuerte se hace, pero una vez que la escuchas, suele desaparecer.',
			'image' => '/img/news/news_flor.png',
			'posted_on' => '2020-05-08',
		],

		[
			'title' => 'Efectos del coronavirus por la rápida transición de la oficina a la casa',
			'author_id' => 1,
			'content' => '<strong> 72% de los colaboradores se ha sentido más estresado producto del teletrabajo </strong>
						<br><br>
						La crisis sanitaria ha cambiado la forma de trabajar a nivel mundial. La repentina y forzosa transición de la oficina a la casa no logró preparar a los colaboradores para este cambio, quienes luego de un mes y medio han empezado a sentir los efectos secundarios del trabajo remoto. Así lo reveló una reciente encuesta realizada por Trabajando.com en donde muestra que el 72% de las personas que realizan teletrabajo declaran sentirse más estresado debido a la carga laboral más los cuidados de la casa.
						<br><br>
						Nuestra Psicóloga clínica y co-founder de Psicología Chile, Andrea Rojas Trincado, señaló a diario El Mercurio que la mayor dificultad está en compatibilizar casa y trabajo: “Esto implica un cambio en las prácticas cotidianas, ya que normalmente tendemos a pensar la casa y el trabajo como esferas importantes, pero separadas. Tener espacios reservados para diferentes actividades ayuda en la planificación de nuestras vidas”, dijo nuestra experta.
						<br><br>
						Cabe destacar que el estudio reveló preocupantes cifras. Entre las razones que les generan estrés, un 59% de los encuestados dice que les ha aumentado la carga laboral; un 54%, que no les alcanza el tiempo; un 49% siente inseguridad laboral, y un 48% siente más presión de sus jefaturas. Sobre los distractores, el repartir tiempo entre la casa y el trabajo (35%) es la principal razón que no facilita una conexión para lograr un buen teletrabajo.',
			'image' => '/img/news/news_teletrabajo.jpeg',
			'posted_on' => '2020-05-04',
		],

		[
			'title' => 'El significado de las emociones',
			'author_id' => 1,
			'content' => 'Las emociones son estímulos producidos por el sistema nervioso central, las cuales se manifiestan a través de los sentidos. Esto genera un pensamiento o viceversa: un pensamiento puede generar una emoción. Las emociones, entonces, son estructuras dinámicas que provocan una reacción o una conducta determinada. Existen emociones básicas, las cuales están dotadas de sentimientos que constituyen o determinan a un ser humano a ser quién es y a actuar de determinada manera; en dicha constitución participan elementos valóricos y culturales que producen una dualidad entre valores sociales y ético- religiosos.
						<br><br>
						La cultura occidental no enseña el significado ni la importancia de las emociones y  las castra desde la infancia mediante alguna construcción o creencia limitadora, como por ejemplo “los niños no lloran”. Desde acá se produce una desconexión emocional en el niño, ya que no puede manifestar la pena y siente vergüenza de ello, entonces la reprime. Esta emoción no desaparece, si no que aparece con otra emoción que sí es aceptada a nivel social, como la rabia, pero es una rabia estéril, la cual se sostiene sobre pena e impotencia.
						<br>
						Otro ejemplo: la creencia limitadora “el que te quiere te aporrea”. Esta frase normativiza el acto de violencia, por lo que cuando recibes una agresión reiterativa, esto genera emociones doble vinculantes: por una parte, felicidad porque “te sientes querido”; por la otra, rabia frente al abuso y violencia. He acá la importancia de reconocer nuestras emociones y reflexionar bajo qué contextos, con qué personas y en qué circunstancias estas se manifiestan en ti.
						Para Julio Olalla, la reflexión debe hacerse desde la conciencia de que somos un tipo de observador, e incluye el esfuerzo de observarnos observando. El lenguaje de las emociones y el cuerpo son distinciones fundamentales que hemos desarrollado para posibilitar esa observación. El lenguaje permite distinguir narrativas, como los ejemplos anteriores, las emociones nos disponen a mirar de cierta manera y el cuerpo nos permite percibir a través de los sentidos.',
			'image' => '/img/news/news_significado_emociones.jpg',
			'posted_on' => '2020-01-25',
		],

		[
			'title' => 'La Autoestima y el Autoconocimiento',
			'author_id' => 1,
			'content' => 'La Autoestima y el Autoconocimiento
						<br><br>
						Abraham Maslow define la autoestima como “la necesidad de respeto y confianza en nosotros mismos, los seres humanos tenemos del deseo de ser aceptados y valorados por los demás”. La autoestima, entonces, se relaciona con la confianza al sí mismo.
						Esta confianza se refleja de múltiples maneras, y una de ellas es cómo te cuidas respecto a las relaciones sociales como las de pareja, las familiares o laborales, y se manifiesta en la manera en que respetas tus opiniones y aclaras tus decisiones frente a otros. Este pensamiento se proyecta de adentro hacia afuera: cómo te sientes y concibes como persona es la manera en que te muestras hacia el mundo y te enfrentas a este.
						La manera en cómo te aprecias guarda una estrecha relación con la forma en que te tratas y en los límites que tú pones ante el mundo. ¿Has notado cómo cuidas a alguien que amas? Esta pregunta responde a cómo tendrías que amar y cuidarte a ti mismo.
						<br><br>
						En la vida estás sometido a cambios abruptos, a los que tienes que adaptarte: es como la sobrevivencia evolutiva, te adaptas o mueres. El amor hacia ti mismo, por el contrario, no debería estar sujeto a cambios contextuales: puede cambiar su intensidad y quizás su presencia, pero nunca su permanencia. Desde la óptica social, estás en constante conexión con el mundo externo, el cual está en un cambio constante; por esto es relevante la confianza que genera la autoestima, para tomar desiciones asertivas y contextuales a los embates de la vida.
						<br><br>
						¿Cómo trabajas la autoestima y la confianza en ti mismo?
						<br><br>
						El primer paso para trabajar la autoestima es conocerte a ti mismo, ya que no puedes trabajar en algo que no conoces. Desde el autoconocimiento, podrás actuar en profunda concordancia con tus propósito y para apreciarte tienes que aceptarte tal cual eres, aunque eso implica aceptar la realidad exterior, y más aun tú propia realidad. El aceptarse incluye admitir los espacios nebulosos que están presentes en ti, como la ira, el tedio, las obsesiones y el mal humor.
						<br><br>
						Estos aspectos conforman tu personalidad, la cual es única, ya que no existe otro “tú” en el mundo. Estos aspectos son parte de tu vida, de tus esfuerzos, de tus logros y también de tus fracasos, por ende han sido parte de un proceso que te ha formado; la vida es susceptible a cambios que no puedes controlar, como “la separación de pareja” o “la muerte de un ser querido”. Para llevar estas penas, tienes que conocerte y sacar las energías para gestionar tus emociones  en momentos de crisis.
						¡Atención a las creencias limitadoras!
						<br><br>
						son concepciones de la vida que asumimos como totales y verdaderas, y en efecto actuamos acorde a estas. Entonces, la creencia que tengas de ti mismo impactará en tu confianza personal, por ejemplo: en la infancia tu madre te decía que eras “flojo”, lo que generó en ti una creencia, la cual incorporas como una verdad incuestionable: en efecto, te terminarás sintiendo y actuando como “flojo” y no invertirás energia para cambiarlo. Por ende la invitación está dirigida a analizar la raíz la creencia y de dónde viene, para luego analizar qué tan cierta es y qué hacer al respecto con ella.',
			'image' => '/img/news/news_autoestima.jpg',
			'posted_on' => '2020-01-25',
		],

		[
			'title' => 'El Síndrome de burn out o Síndrome del quemado o cabeza Quemada',
			'author_id' => 1,
			'content' => 'A lo largo de la vida laboral nos enfrentamos a diversos trabajos, los cuales tienen diversas dificultades. En todo tipo de empleos -por más entretenidos o monótonos que éstos parezcan- es común que en  algún momento nos agotemos o aburramos. Existe un fenómeno llamado “Síndrome de burn out” o “Síndrome del quemado”, éste refiere al estrés que genera el trabajo, gatilla ansiedad y depresión.
						<br><br>
						<strong>Comencemos por definir el estrés</strong>
						<br><br>
						Esta palabra es muy utilizada en estos tiempos de “la inmediatez” o del “ahora ya”. Es común escuchar en el mundo laboral que las tareas “son para ayer” o que “el tiempo es oro”, lo cual, como construcción lingüística, ya genera estrés.
						Cabe mencionar que el estrés, es una reacción del cuerpo que nos hace, “estar alerta” a alguna amenaza externa, por esto sus síntomas se asocia con palpitaciones, sudor, temblores e hiperventilación.
						La ansiedad, por su parte, es una sensación o emoción que afecta de manera física y psicosociológica. Ésta produce tensión, nerviosismo o rabia; cada persona tiene una manera distinta de reaccionar ante este síntoma.
						Aunando estos conceptos, dicho síndrome, refiere al estrés que provoca una sobrecarga laboral, la que produce un agotamiento generalizado, con síntomas de desgano, angustia, cambios de peso, falta de energía y mal humor, o bien, actitudes oposicionistas desafiantes.
						<br><br>
						<strong>Veamos algunos ejemplos:</strong>
						<br><br>
						Es común escuchar en personas que están pasando por el síndrome de burn out, lo siguiente:
						“En el trabajo siento que no valoran mi trabajo, y me esfuerzo y es lo mismo, o es más cuando doy ideas no son escuchadas. Entonces decidí no opinar más de lo necesario y tratar de que el día pase lo más rápido que pueda, porque se me hace eterno el turno”
						<br>
						“Cuando llego a la empresa, de inmediato se me aprieta el estómago. No sé, es una sensación rara y comienzo con indigestión”
						<br>
						“Antes no me pasaba, pero hace algún tiempo, cuando entro a una reunión, se me olvida lo que voy a decir, y cuando esto pasa, me empiezan a temblar las manos y comienzan a sudar. Es terrible porque mientras más nervioso me pongo, mi corazón comienza a latir más fuerte”
						<br>
						Una de las características principales para detectar un “burn out” es “la mala disposición” de un sujeto a cualquier tipo de tarea o relación interpersonal al interior de un trabajo.
						<br>
						Usualmente ocurre cuando una persona se ve sobrepasada en sus tareas laborales, esto le produce una fatiga emocional, falta de motivación, dolores lumbares o estomacales, por ello, es que cada vez la jornada laboral se percibe más lenta y aburrida.
						Este trastorno es progresivo; la tolerancia es cada vez es menor, comienza a bajar el rendimiento, por lo que aprender métodos nuevos y adaptarse a los cambios de una organización se hace cada vez más complejo.
						Un estrés laboral no tratado, podría producir un problema cognitivo que afecte a la memoria.
						<br>
						Este trastorno tiene que ser tratado por un especialista de la salud mental, para poder sobrellevarlo de la mejor manera y mitigar los efectos que impactan en nuestro desempeño laboral y en las relaciones con nuestros compañeros, colaboradores o equipos de trabajo.
						<br>
						En una terapia se indaga sobre la raíz de este trastorno, y se diseña un plan de trabajo para así dar lineamientos sobre las actitudes que deben ser superadas y que emergen en terapia. También es una gran oportunidad para trabajar en ciertas competencias laborales que están más débiles y que impactan en el desempeño, metas u objetivos relacionados al mundo laboral, o bien en la vida familiar o social.',
			'image' => '/img/news/news_born.jpg',
			'posted_on' => '2018-04-27',
		],

		[
			'title' => '¿Qué es la culpa?',
			'author_id' => 1,
			'content' => 'La culpa y su relación con las emociones
						<br><br>
						Cuando quiebras una norma o creencia impuesta por un ente formador como la familia, la religión o la moral, se produce un pensamiento, generalmente obsesivo, sobre el suceso en el que se quiebra la norma. Esto genera un sentimiento de culpa, el que termina por provocar sensaciones desagradables en el cuerpo como malestar, indigestión o hasta vómitos.
						<br><br>
						La culpa invita a la reacción, a hacer ahora ya: su contenido es presente, pero evoca el pasado y se angustia por el futuro. Por esto se presenta con tanto ímpetu, ya que quiere con todas sus fuerzas punitivas -frente a la norma que quebraste- hacerte reaccionar para así generar un acto reparatorio en tu conducta.
						<br><br>
						La culpa produce emociones que invaden el cuerpo y la mente llenándolas de significaciones, recuerdos y sensaciones; estas no pueden ser evitadas, es posible que las resistas o que las niegues en un determinado contexto o circunstancia, pero estas se terminarán manifestando de alguna u otra manera.
						<br><br>
						¿Qué provocas en ti,  al evitar la culpa?
						<br><br>
						El hecho de evitar las emociones generadas por la culpa demuestra tu incapacidad de asumirlas/asumirte y aceptarlas/aceptarte. Al evitarlas se produce la llamada inconciencia emocional, la cual se observa de dos formas: frialdad estoica, que se refiere a una postura rígida, poco empática que muestra que nada le importa, ni le afecta. Por otro lado está la explosión/implosión, la explosión manifiesta hacia el exterior toda la emoción acumulada y la implosión es cuando esa emoción acumulada te la guardas y la vives de forma interna, según Paula Aroca esta última es la mas nociva para la salud.
						<br><br>
						Dichas formas tarde o temprano generan una crisis, produciendo en ti una sensación de vergüenza, debido a la pérdida del control y la desconexión contigo mismo.
						<br><br>
						La vergüenza provocada por la culpa
						<br><br>
						La vergüenza provocada por la culpa genera que eleves tus  resistencias de afrontamiento a esta, creándose así el ciclo represión-explosión-represión. Koffman releva la importancia de atender las emociones como la vergüenza, señalando que “la única manera de no sentir las emociones es desterrándolas de la conciencia, pero los pensamientos y los sentimientos inconscientes son como una infección interna: invisibles y letales”.
						<br><br>
						Para desterrarlas de la conciencia debes hacer un acto reparatorio de la acción que generó esa culpa, como por ejemplo: si fuiste infiel y esto te genera cierta culpa que se manifiesta en pensamientos o creencias de que “te van a engañar” o “dejar” por tu falta y lo significas casi como si te lo merecieras, has caído en el mecanismo punitivo y obsesivo de la culpa.
						<br><br>
						La forma de hacer un acto reparatorio no tiene que ver en este caso con el afectado, si no contigo mismo: debes pensar en lo que hiciste o sea reconocerlo a ti mismo -ya que es usual evitar pensar en ello- y poner en la balanza el disfrute que te produjo el acto infiel versus estos pensamientos obsesivos e intranquilizadores que te persiguen. Al comprender los resultantes quizás podrás hacer un compromiso de no volverlo a hacer, pero no solo por la consideración abstracta de que está mal, si no por las consecuencias que este acto produjo en ti.',
			'image' => '/img/news/news_culpa.jpg',
			'posted_on' => '2020-01-25',
		],
	];

	public function run()
	{
		for ($i = 0; $i < count(self::NEWS_DATA); $i++) {
			DB::table('news')->insert([
				'title' => self::NEWS_DATA[$i]['title'],
				'author_id' => self::NEWS_DATA[$i]['author_id'],
				'content' => self::NEWS_DATA[$i]['content'],
				'image' => self::NEWS_DATA[$i]['image'],
				'posted_on' => self::NEWS_DATA[$i]['posted_on'],
			]);
		}
	}
}
