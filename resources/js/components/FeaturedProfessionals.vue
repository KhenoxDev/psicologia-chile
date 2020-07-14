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
      :autoplay="false"
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
                  @click="getDataProfessional(slide.picProfessional, slide.nameProfessional, slide.titleProfessional, slide.priceProfessional, slide.codProfessional, slide.validationCollege, slide.dispProfessional)"
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
	    <!-- <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenter">Información Profesional</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> -->
          <div class="modal-body details--container">
			  <!-- <span class="promotion--border">top</span> -->
			<div class="div--image">
				<img class="img--professional--modal rounded-circle" :src="imageP" :alt="professional" />
			</div>
			<div class="div--text">
				<span class="span--name">{{ professional }}</span>
				<span v-if="valCollege == true" class="span--title"><img src="img/check-circle.svg" alt=""> {{ title }} verificado por colegiopsicologos.cl</span>
            	<span v-else class="span--title"><img src="img/check-circle.svg" alt=""> {{ title }} </span>
				<span class="span--price"><i class="fas fa-tags"></i> {{ price }}</span>
				<span class="span--disp"><i class="far fa-calendar-alt"> {{ dispProf }} </i></span>
			</div>
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
      breakpoints: {
        321: {
          slideRatio: 1 / 2,
          visibleSlides: 1,
          arrows: false
        },
        376: {
          slideRatio: 1 / 2,
          visibleSlides: 1,
          arrows: false
        },
        769: {
          slideRatio: 1 / 4,
          visibleSlides: 2,
          arrows: false
        },
        1025: {
          slideRatio: 1 / 6,
          visibleSlides: 3,
          arrows: false
        },
        1445: {
          slideRatio: 1 / 8,
          visibleSlides: 4,
          arrows: false
        },
        2561: {
          slideRatio: 1 / 8,
          visibleSlides: 5,
          arrows: false
        }
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
		  dispProfessional: "Lunes a sábado"
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
		  dispProfessional: "Lunes a sábado"
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
		  dispProfessional: "Lunes a sábado"
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
		  dispProfessional: "Lunes a sábado"
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
		  dispProfessional: "Lunes a sábado"
        }
      ]
    };
  },
  methods: {
    getDataProfessional: function(
	  picProfessional,
      nameProfessional,
      titleProfessional,
	  priceProfessional,
	  codProfessional,
	  validationCollege,
	  dispProfessional
    ) {
      let vm = this;

	  vm.imageP = picProfessional;
      vm.professional = nameProfessional;
      vm.title = titleProfessional;
	  vm.price = priceProfessional;
	  vm.codigoPsy = codProfessional;
	  vm.valCollege = validationCollege;
	  vm.dispProf = dispProfessional;
    }
  }
};
</script>
