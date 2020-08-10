<template>
  <div id="mainProfessionals" class="container mt-4">
    <span class="title--section">
      <strong>Profesionales</strong> destacados
    </span>
    <hr class="line--separator" />
    <vueper-slides
      class="no-shadow"
      :breakpoints="breakpoints"
      slide-multiple
      :autoplay="off"
      :touchable="false"
      infinite
      bullets-outside
    >
      <vueper-slide v-for="slide in slides" :key="slide.id" class="circulo--flotante">
        <template v-slot:content>
          <!-- Campos tabla profesionales destacados -->
          <div id="cardFeaturedProfessionals" class="card card-body card--featuredprofessionals">
            <img
              class="img-fluid border--picprofessional"
              :src="slide.picProfessional"
              :alt="slide.nameProfessional"
            />
            <div class="professionals--container">
              <span>{{ slide.nameProfessional }}</span>
              <div class="seemore--professionals">
                <button
                  data-toggle="modal"
                  data-target="#exampleModalLong"
                  @click="getDataProfessional(slide.picProfessional, slide.nameProfessional, slide.titleProfessional, slide.priceProfessional, slide.codProfessional, slide.validationCollege, slide.dispProfessional, slide.descProfessional, slide.specialist)"
                >Ver más</button>
              </div>
            </div>
            <span id="saleid" class="circulo--professionals" v-if="slide.promocion">
              <span>{{ slide.sale }}</span>
            </span>
          </div>
          <!-- fin campos tabla profesionales destacados -->
        </template>
      </vueper-slide>
    </vueper-slides>
    <!-- inicio Modal -->
    <div
      class="modal fade"
      id="exampleModalLong"
      tabindex="-1"
      role="dialog"
      aria-labelledby="ModalProfessional"
      aria-hidden="true"
    >
      <div class="modal-dialog modal--style" role="document">
        <div class="modal-content">
          <div class="modal-body details--container">
            <!-- <span class="promotion--border">top</span> -->
            <div class="professional--container">
              <div class="div--image">
                <img class="img--professional--modal" :src="imageP" :alt="professional" />
              </div>
              <div class="div--text">
                <span class="span--name">{{ professional }}</span>
                <span v-if="valCollege == true" class="span--title">
                  <img src="img/check-circle.svg" alt />
                  {{ title }} verificado por colegiopsicologos.cl
                </span>
                <span v-else class="span--title">
                  <img src="img/check-circle.svg" alt />
                  {{ title }}
                </span>
                <span class="span--price">
                  <i class="fas fa-money-bill"></i>
                  {{ price }}
                </span>
                <span class="span--disp">
                  <i class="far fa-calendar-alt"></i>
                  {{ dispProf }}
                </span>
              </div>
            </div>
            <!-- Inicio Acordeón Especialidades-->
            <div id="accordion" class="acordeon--body--specialist">
              <div id="headingOne">
                <h5 class="mb-2">
                  <button
                    class="btn pointer"
                    data-toggle="collapse"
                    data-target="#collapseOne"
                    aria-expanded="false"
                    aria-controls="collapseOne"
                  >
                    Especialidades
                    <i class="fas fa-plus"></i>
                    <i class="fas fa-minus"></i>
                  </button>
                </h5>
              </div>

              <div
                id="collapseOne"
                class="collapse hide"
                aria-labelledby="headingOne"
                data-parent="#accordion"
              >
                <div>
                  <div class="specialist--container">
                    <span
                      class="badge badge-primary span--specialist"
                      v-for="spec in specProf"
                      :key="spec.id"
                    >{{ spec.name }}</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- Fin Acordeón Especialidades -->

            <!-- Inicio Acordeón Descripción -->
            <div id="accordion" class="acordeon--body--description">
              <div id="headingOne">
                <h5 class="mb-2">
                  <button
                    class="btn pointer"
                    data-toggle="collapse"
                    data-target="#collapseTwo"
                    aria-expanded="false"
                    aria-controls="collapseTwo"
                  >
                    Descripción
                    <i class="fas fa-plus"></i>
                    <i class="fas fa-minus"></i>
                  </button>
                </h5>
              </div>

              <div
                id="collapseTwo"
                class="collapse hide"
                aria-labelledby="headingOne"
                data-parent="#accordion"
              >
                <div>
                  <div class="description--container">
                    <span class="span--desc">{{ descProf }}</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- Fin Acordeón Descripción -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Contratar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- fin Modal -->
  </div>
</template>
<script>
import { VueperSlides, VueperSlide } from "vueperslides";

export default {
  components: { VueperSlides, VueperSlide },
  data() {
    return {
      imageP: "",
      professional: "",
      title: "",
      price: 0,
      codigoPsy: "",
      valCollege: "",
      dispProf: "",
      descProf: "",
      specProf: [],
      breakpoints: {
        321: {
          slideRatio: 1 / 2,
          visibleSlides: 1,
          arrows: false,
        },
        376: {
          slideRatio: 1 / 2,
          visibleSlides: 1,
          arrows: false,
        },
        769: {
          slideRatio: 1 / 4,
          visibleSlides: 2,
          arrows: false,
        },
        1025: {
          slideRatio: 1 / 8,
          visibleSlides: 4,
          arrows: false,
        },
        1445: {
          slideRatio: 1 / 8,
          visibleSlides: 4,
          arrows: false,
        },
        2561: {
          slideRatio: 1 / 8,
          visibleSlides: 5,
          arrows: false,
        },
      },
      slides: [
        {
          title: "Slide #1",
          content: "Slide content.",
          picProfessional: "img/professionals/Carla_Oyarce.png",
          nameProfessional: "Carla Oyarce",
          titleProfessional: "Psicólogo",
          priceProfessional: "$30.000",
          promocion: true,
          sale: "Primera Sesión GRATIS",
          codProfessional: "16303320-8",
          validationCollege: true,
          dispProfessional: "Lunes a sábado",
          descProfessional:
            "Psicologa Clínica, titulada la de universidad Arcis, orientación psicoanalítica.Cuento con un diplomado en clinica psicoanalitica y sistemica. Me especializo en Psicoterapia y Psicodiagnósticos de adultos y adolescentes. Ofresco un espacio de escucha activa, de confidencialidad y respeto. para abordar en conjunto, los aspectos de su vida, que provocan dolor. Reconocer la Problematica y  llegar a una solución, al Cambio y al alivio. Especialidades que trabajo: Ansiedad, autoestima, trastornos de personalidad, depresión, duelos amorosos, duelos, estres, dependencia emocional, trastornos alimenticios, problemas de genero, control de impulso, déficit atenciónal, terapia adolecente y adulto, sexologia. Orientación padres y adolescentes en crisis. Traumas Universidad de arte y ciencias sociales ARCIS",
          specialist: [
            { name: "Ansiedad" },
            { name: "Autoestima" },
            { name: "Dependencia emocional" },
            { name: "Trastorno Alimenticio" },
          ],
        },
        {
          title: "Slide #2",
          content: "Slide content.",
          picProfessional: "img/professionals/Alex_Balada_Carrasco.png",
          nameProfessional: "Alex Balada Carrasco",
          titleProfessional: "Coach",
          priceProfessional: "$29.990",
          promocion: false,
          sale: "¡PROMOCIÓN!",
          codProfessional: "17403380-3",
          validationCollege: false,
          dispProfessional: "Lunes a sábado",
          descProfessional:
            "Psicólogo Clínico de la Universidad Andrés Bello, actualmente cursando Magister en Psicología e Intervención en Salud Mental. Realizo procesos de psicodiagnóstico, psicoterapia y acompañamiento terapéutico en distintas etapas del ciclo vital mediante un enfoque psicoanalítico con apertura a terapias narrativas para que así, en el trabajo y la exploración conjunta, mediante historización y resignificación puedas encontrar un nuevo sentido a tu experiencia.",
          specialist: [
            { name: "Ansiedad" },
            { name: "Bullying" },
            { name: "Depresión" },
          ],
        },
        {
          title: "Slide #3",
          content: "Slide content.",
          picProfessional: "img/professionals/Claudia_Jeldres_Guajardo.png",
          nameProfessional: "Claudia Jeldres Guajardo",
          titleProfessional: "Psiquiatra",
          priceProfessional: "$30.000",
          promocion: false,
          sale: "¡PROMOCIÓN!",
          codProfessional: "12239542-1",
          validationCollege: true,
          dispProfessional: "Lunes a sábado",
          descProfessional:
            "Licenciada en Psicología,  titulada de la Universidad Santo Tomás, con experiencia en el centro de atención psicológica de la Universidad Santo Tomás y de manera particular.  Entregando  atención psicológica  a pacientes infanto juvenil y adultos, trabajando tanto individualmente como grupalmente. Experiencia en Coaching, Psicodiagnóstico e intervenciones terapéuticas.  Diseños e intervenciones grupales en el área clínica. Cruz del norte.",
          specialist: [
            { name: "Autoestima" },
            { name: "Coaching" },
            { name: "Duelos" },
            { name: "Estrés" },
            { name: "Estrés laboral" },
          ],
        },
        {
          title: "Slide #4",
          content: "Slide content.",
          picProfessional: "img/professionals/Gabriel_Gonzalez_Salinas.png",
          nameProfessional: "Gabriel Gonzalez Salinas",
          titleProfessional: "Psicólogo",
          priceProfessional: "$30.000",
          promocion: false,
          sale: "¡PROMOCIÓN!",
          codProfessional: "18097123-8",
          validationCollege: false,
          dispProfessional: "Lunes a sábado",
          descProfessional:
            "Psicólogo clínico de la Universidad San Sebastián, certificado en técnicas de psicoterapia breve en Cesist Chile. Tengo experiencia trabajando en diversas temáticas de salud mental, tanto con pacientes infanto-juveniles como con adultos. Trabajo desde un enfoque activo, que busca establecer la relación entre nuestros afectos, conductas, cogniciones y aspectos de nuestro propio ser, con el fin de funcionar de manera cohesionada y adaptativa según tus deseos y necesidades. Juntos trabajaremos en un espacio de escucha activa y de confianza utilizando técnicas y, la palabra como herramienta, con el fin de generar autonomía para dar resolución a tus problemas.",
          specialist: [
            { name: "Habilidades sociales" },
            { name: "Terapia de pareja" },
            { name: "Dependencia emocional" },
          ],
        },
        {
          title: "Slide #5",
          content: "Slide content.",
          picProfessional: "img/professionals/Sofia_Fiedler_Porzio.png",
          nameProfessional: "Sofia Fiedler Porzio",
          titleProfessional: "Psicólogo",
          priceProfessional: "$30.000",
          promocion: false,
          sale: "¡PROMOCIÓN!",
          codProfessional: "17402529-0",
          validationCollege: false,
          dispProfessional: "Lunes a sábado",
          descProfessional:
            "Profesional con experiencia de trabajo en área laboral y Clínica-Comunitaria. Mi formación y trayectoria profesional, me ha llevado a conocer a las personas desde su diversidad, entendiéndolas como seres integrales, tomando en consideración todos sus aspectos. No somos solo cuerpo, somos seres biopsicosociales por lo que es importante tomar en cuenta todas sus variables para poder entendernos y desarrollarnos mejor como seres humanos.  Mi formación inicialmente fue laboral y organizacional. Sin Embargo, después de diversas especializaciones, hoy me desarrollo como psicóloga clínica y comunitaria.   Me titulé de psicóloga el año 2014, en la Universidad del Pacífco, en Santiago de Chile, adquiriendo una formación humanista-transpersonal, que me ha llevado a integrar diversas técnicas y metodologías integrando meditación, arte terapia, entre otras, dentro del proceso terapéutico, comprendiendo a la persona como un ser integral, abarcando todos sus ejes. El 2015, comienzo estudios de Maestría en estudios de Género en la UCES, De Buenos Aires, donde integro la perspectiva de género a la consulta, abriendo posibilidades de comprender desde esta rama, diversas problemáticas y crisis con respecto a identidad y roles  del paciente, especializándome en adolescentes y adultos. Actualmente en el 2019, me especializo en Dolor Crónico No Oncológico, en el Centro del Dolor De Chile, trabajando a nivel terapéutico el tratamiento y la aceptación del dolor en pacientes que sufren de enfermedades relacionadas con el dolor crónico como fibromialgia, lumbago, Colon irritable entre otros. Isapres Cruz del norte.",
          specialist: [
            { name: "Coaching" },
            { name: "Duelos amorosos" },
            { name: "Psicología geriátrica" },
          ],
        },
      ],
    };
  },
  methods: {
    getDataProfessional: function (
      picProfessional,
      nameProfessional,
      titleProfessional,
      priceProfessional,
      codProfessional,
      validationCollege,
      dispProfessional,
      descProfessional,
      specialist
    ) {
      let vm = this;

      vm.imageP = picProfessional;
      vm.professional = nameProfessional;
      vm.title = titleProfessional;
      vm.price = priceProfessional;
      vm.codigoPsy = codProfessional;
      vm.valCollege = validationCollege;
      vm.dispProf = dispProfessional;
      vm.descProf = descProfessional;
      vm.specProf = specialist;
    },
  },
};
</script>
