<template>
  <div class="vld-parent">
    <transition>
      <loading-component
        :active.sync="isLoading"
        :is-full-page="fullPage"
        :opacity="100"
        v-bind:color="'#f4b034'"
      ></loading-component>
    </transition>
    <div class="bg--section bg--professional-banner">
      <banner banner-identification="mainSpecialist--banner" banner-title="Especialidades"></banner>
    </div>
    <div class="container pt-4">
      <ul class="list--specialist">
        <li class="list--specialist-item" v-for="specialist in specialists" :key="specialist.id">
          <a
            :title="specialist.nombre"
            :id="specialist.codigo"
            href="/acoso-laboral"
            data-toggle="modal"
            data-target="#modalSpecialist"
            @click="getProfessionalsBySpecialist(specialist.codigo, specialist.nombre, specialist.descripcion)"
          >{{ specialist.nombre }}</a>
        </li>
      </ul>
    </div>
    <div
      class="modal fade"
      id="modalSpecialist"
      tabindex="-1"
      role="dialog"
      aria-labelledby="specialistLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="specialistLabel">{{ specialistName }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            {{ specialistDescription }}
            <div>
              <div class="specialist-title--list">
                <a
                  data-toggle="collapse"
                  href="#listProfessionals"
                  role="button"
                  aria-expanded="false"
                  aria-controls="listProfessionals"
                >Ver profesionales asociados</a>
              </div>
              <div class="collapse" id="listProfessionals">
                <div class="specialist-content--list">
                  <a
                    v-for="prof in specialistProfessionals"
                    :key="prof.id"
                    :href="'profesionales/' + prof.index"
                  >
                    <img :src="prof.foto" :alt="prof.nombreCompleto" />
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LoadingComponent from "vue-loading-overlay";
import Banner from "../Reusable/Banner";

export default {
  data() {
    return {
      isLoading: true,
      fullPage: true,
      specialists: [],
      specialistProvisional: [
        {
          name: "Estrés",
          description:
            "El estrés es la reacción de su cuerpo a un desafío o demanda. En pequeños episodios el estrés puede ser positivo, como cuando le ayuda a evitar el peligro o cumplir con una fecha límite. Pero cuando el estrés dura mucho tiempo, puede dañar su salud.",
        },
      ],
      specialistName: "",
      specialistDescription: "",
      specialistProfessionals: [],
    };
  },
  components: {
    LoadingComponent,
    Banner,
  },
  mounted() {
    this.onLoad();
    this.getSpecialists();
  },
  methods: {
    onLoad() {
      this.isLoading = true;
      setTimeout(() => {
        this.isLoading = false;
      }, 2000);
    },
    async getSpecialists() {
      this.specialists = [];
      const api =
        "https://online.psicologiachile.cl/gateway-json.php?service=especialidades";

      try {
        let response = await axios.get(api);

        for (let index = 0; index < response.data.items.length; index++) {
          this.specialists.push(response.data.items[index]);
        }

        this.specialists.some((specialist) => {
          switch (specialist.nombre) {
            case "Estrés":
              specialist.descripcion =
                "El estrés es la reacción de su cuerpo a un desafío o demanda. En pequeños episodios el estrés puede ser positivo, como cuando le ayuda a evitar el peligro o cumplir con una fecha límite. Pero cuando el estrés dura mucho tiempo, puede dañar su salud.";
              break;
            case "Duelos amorosos":
              specialist.descripcion =
                "El duelo amoroso es un proceso de ajuste emocional después de una ruptura, durante el cual diversas emociones compiten entre sí. El camino incluye etapas diferentes que pueden explicarse por separado, pero que no se presentan siempre de un modo ordenado.";
              break;
            case "Trastornos de personalidad":
              specialist.descripcion =
                "Los trastornos de la personalidad son un grupo de afecciones mentales en las cuales una persona tiene un patrón prolongado de comportamientos, emociones y pensamientos que es muy diferente a las expectativas de su cultura. Estos comportamientos interfieren con la capacidad de la persona para desempeñarse en las relaciones interpersonales, el trabajo y otros contextos.";
              break;
            case "Trastorno Alimenticio":
              specialist.descripcion =
                "Los trastornos de la alimentación son afecciones graves que se relacionan con las conductas alimentarias que afectan negativamente la salud, las emociones y la capacidad de desempeñarte en áreas importantes de la vida. Los trastornos de la alimentación más frecuentes son la anorexia nerviosa, la bulimia nerviosa, y el trastorno alimentario compulsivo.";
              break;
            case "Trastorno del sueño":
              specialist.descripcion =
                "Un trastorno del sueño puede afectar tu salud, seguridad y calidad de vida en general. La falta de sueño puede afectar tu capacidad para conducir con seguridad y aumentar el riesgo de otros problemas de salud.";
              break;
            case "Trastornos del sueño":
              specialist.descripcion =
                "Un trastorno del sueño puede afectar tu salud, seguridad y calidad de vida en general. La falta de sueño puede afectar tu capacidad para conducir con seguridad y aumentar el riesgo de otros problemas de salud.";
              break;
            case "Autoestima":
              specialist.descripcion =
                "La autoestima se puede definir como el resultado emocional que surge si aceptamos y nos gusta nuestro autoconcepto.";
              break;
            case "Duelos":
              specialist.descripcion =
                "El duelo es el proceso psicológico que se produce tras una pérdida, una ausencia, una muerte o un abandono. Es diferente para cada persona. Se pueden sufrir diferentes síntomas emocionales y físicos como: ansiedad, miedo, culpa, confusión, negación, depresión, tristeza, shock emocional, etc.";
              break;
            case "Habilidades sociales":
              specialist.descripcion =
                "Las habilidades sociales (HHSS) en psicología son un conjunto de conductas y hábitos observables y de pensamientos y emociones que fomentan la comunicación eficaz, las relaciones satisfactorias entre las personas y el respeto hacia los demás, hecho que lleva a un mejor sentimiento de bienestar.";
              break;
            case "Coaching":
              specialist.descripcion =
                "El coaching es una metodología que entrena las herramientas personales de las personas, liberando su potencial para incrementar al máximo su desempeño. Éste consiste en ayudar a aprender o desaprender ciertas pautas de comportamiento para identificar el foco del problema, como también los impedimentos para lograr los resultados esperados.";
              break;
            case "Psicología geriátrica":
              specialist.descripcion =
                "La Psicología Geriátrica es la rama especializada en el estudio de la ancianidad y en los problemas asociados al proceso de envejecimiento. De acuerdo con los últimos datos aportados por el INE (Instituto de Nacional de Estadística), un 19,1 % de nuestra población supera los 65 años de edad. Tomando como referencia el incremento de los últimos años, se prevé que este porcentaje alcance la cifra del 34,6 % en 2066.";
              break;
            case "Orientación a padres de adolescentes en crisis":
              specialist.descripcion =
                "La adolescencia es un periodo normativo de la experiencia humana, un puente entre la niñez y la adultez, en el cual los jóvenes van desarrollando su identidad y personalidad. Este trance trae consigo dificultades en la sociabilización con padres y cuidadores, dado que supone la obtención de independencia y la integración de nuevas pautas sociales que corresponden a las de su generación, lo cual contrasta marcadamente con la imagen que se tiene de la etapa infantil.";
              break;
            case "Terapia de pareja":
              specialist.descripcion =
                "La terapia de pareja, tiene como objetivo, apoyar, todas aquellas diferencias y conflictos, que, por diversas razones, los miembros de la pareja no han podido hacerlo de manera conjunta y necesitan de un tercero imparcial que los ayude a resolver la situación que los afecta.";
              break;
            case "Dependencia emocional":
              specialist.descripcion =
                "La dependencia emocional se caracteriza por establecer un vinculo de carácter ansioso hacia una persona, validansose através de ella; por lo cual depende de la aprobación y la atención constante de ese otro, ya que de esta manera el se siente seguro y protegido.";
              break;
            case "Problemas de autoestima":
              specialist.descripcion =
                "Una de las problemáticas más frecuentes en las clínicas de psicología son las relacionadas con la baja autoestima; estas consisten en el conjunto de percepciones, pensamientos y sentimientos negativos que puede tener una persona hacia sí misma.";
              break;
            case "Depresión pre y post parto":
              specialist.descripcion =
                "Todo cambio en la vida genera un estrés, al tener que adaptarse a una nueva realidad. En el caso específico del embarazo, se alteran las hormonas, planes de vida y cambia la dinámica diaria.";
              break;
            case "Depresión":
              specialist.descripcion =
                "La depresión es una enfermedad que afecta el modo de sentir y pensar del individuo. Provoca sensaciones de vacío constante o intermitente y las razones de esto pueden ser fundadas o no. Repercute en las relaciones sociales, ya que afecta en la comunicación con la familia, pareja, amigos y/o el trabajo.";
              break;
            case "Coach":
              specialist.descripcion =
                "El coaching es una metodología que entrena las herramientas personales de las personas, liberando su potencial para incrementar al máximo su desempeño. Éste consiste en ayudar a aprender o desaprender ciertas pautas de comportamiento para identificar el foco del problema, como también los impedimentos para lograr los resultados esperados.";
              break;
            case "Adicciones":
              specialist.descripcion =
                "Las adicciones generan cambios a nivel cerebral, particularmente sobre los receptores neuronales de dopamina y serotonina, los cuales controlan funciones relacionadas con la recompensa. Tal situación, a largo plazo, genera la necesidad de mayores niveles de consumo de sustancias para obtener los efectos deseados.";
              break;
            case "Estrés laboral":
              specialist.descripcion =
                "El estrés se ha convertido en un factor más dentro del mundo laboral actual, muchas veces convive en determinadas empresas según sea su cultura organizacional. Este clima de exigencia, competitividad e inmediatez y preocupación por los resultados muchas veces se traducen en estrés laboral y por extensión a una situación de malestar para la persona en otros ámbitos de su vida más allá del laboral.";
              break;
            case "Bullying":
              specialist.descripcion =
                "El bullying o acoso escolar se refiere a un tipo de comportamiento violento e intimidatorio que se ejerce de manera verbal, física o psicológica entre niños y adolescentes durante la etapa escolar.";
              break;
            case "Duelo":
              specialist.descripcion =
                "El duelo es un proceso que conlleva atravesar una serie de etapas, lo que usualmente se inicia con la negación de lo ocurrido y culmina con su aceptación. El manejo y la intensidad emocional con la que se enfrente la situación dependerá en parte de como hayan ocurrido los hechos, ya sea esta, de forma esperado o sorpresiva y del apoyo con el que se cuente, el contexto y los recursos psicológicos existentes.";
              break;
            case "Problemas con el control de impulsos":
              specialist.descripcion =
                "La pérdida del control de impulsos puede originarse por múltiples factores, los cuales, al ser extendidos en el tiempo, moldean la manera en que el cerebro responde a los estímulos externos. Dicho modo de responder limita el tiempo de una respuesta, careciendo del espacio suficiente para procesar la acción que se estaría generando.";
              break;
            case "Sexología":
              specialist.descripcion =
                "Es una especialidad de la psicología que trabaja en la dificultad en el desempeño y rendimiento de la actividad sexual.";
              break;
            case "Déficit atencional":
              specialist.descripcion =
                "El déficit atencional debe ser diagnosticado por un especialista (neurólogo o psicopedagogo)en la mayoría de los casos se sigue un tratamiento farmacológico que mejora considerablemente los niveles de concentración en los niños y por ende su rendimiento escolar, pero es importante que tengamos presente que en la mayoría de los casos el déficit atencional no es un transtorno grave y que básicamente afecta el rendimiento, es por ello que cada padre debe evaluar la medicación del niño y preguntarse si se justifica drogarlo (con todos lo efectos secundarios que ellos tienen sobre el organismo) para obtener un mejor rendimiento académico.";
              break;
            case "Ansiedad":
              specialist.descripcion =
                "La ansiedad es un estado mental que se experimenta a raíz de un episodio estresante. Algunas veces no se logra identificar el gatillante de manera consciente. Es una sensación desagradable que involucra el cuerpo y la mente, produciendo bloqueos, inseguridad, pensamientos negativos, miedos, temblores, sudoración y mareos.";
              break;
            case "Ruptura Emocional":
              specialist.descripcion =
                "Las rupturas emocionales son duelos, procesos en los que las personas se adaptan a la pérdida del objeto amado, es decir de seres queridos y/o materiales. Como tal es esperable que ocurra una crisis, lo que supone una etapa de negación y de inestabilidad en el que los recursos psicológicos existentes no logran ser suficientes para sobrellevar la situación. Su extensión en el tiempo, dependerá de lo anterior como también de las estrategias utilizadas para su abordaje.";
              break;
            case "Dolores crónicos oncológicos":
              specialist.descripcion =
                "Al hablar de cáncer y abordar su complejidad, muchas veces nos remitimos casi exclusivamente a sus efectos físicos, olvidando la gran importancia que tienen los componentes psicológicos. Independiente de la gravedad del asunto, el sólo hecho de poseer la enfermedad genera shock, afectando tanto a la persona que lo padece como a su entorno más cercano.";
              break;
            case "Fibromialgia":
              specialist.descripcion =
                "Esta afección trata de una sensación corporal de dolor crónico a nivel general, en la cual se presume que existe ausencia de estímulos que lo puedan desencadenar. Personas que lo padecen describen sentir dolor músculo esquelético por todo el cuerpo, de manera difusa y no específica. Cuando los síntomas perduran por más de tres meses, se hace efectiva su identificación.";
              break;
            case "Problemáticas de Género":
              specialist.descripcion =
                "Para comprender la naturaleza de esta problemática es necesario distinguir los conceptos de género y sexualidad. Este último refiere a un ámbito biológico, el cual representa las diferencias en las características anátomicas y hormonales de las personas.";
              break;
            case "Psicología del Deporte":
              specialist.descripcion =
                "La Psicología del Deporte es la rama de la Psicología que estudia —bajo un prisma científico— los procesos cognitivos, emocionales y conductuales de las personas en el contexto deportivo. Por un lado, investiga cómo estas variables afectan el rendimiento físico y, por otro, cuáles son los beneficios del ejercicio físico en nuestro bienestar mental y físico. En sus investigaciones se contemplan también los factores ambientales y fisiológicos que influyen en la actividad física.";
              break;
            case "Terapia en adolescentes":
              specialist.descripcion =
                "La adolescencia es un período de la vida en la que la confusión es el aspecto dominante. En ella se inician nuevas relaciones con los padres y también con el exterior; se produce una ruptura con el mundo infantil. Además los cambios fisiológicos también tienen que integrarse en la vida de los adolescentes de manera que éstos puedan adaptarse a su nueva imagen corporal. Si a esto le sumamos las cambios a nivel neurológico, podríamos hablar directamente de una psicología del adolescente.";
              break;
            default:
              break;
          }
        });
      } catch (error) {
        console.log(error);
      }
    },
    async getProfessionalsBySpecialist(id, nombre, descripcion) {
      this.specialistName = nombre;
      this.specialistDescription = descripcion;
      this.specialistProfessionals = [];
      const api =
        "https://online.psicologiachile.cl/gateway-json.php?service=staff&especialidad=" +
        id;

      try {
        let response = await axios.get(api);

        for (let index = 0; index < response.data.items.length; index++) {
          this.specialistProfessionals.push(response.data.items[index]);
        }
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
