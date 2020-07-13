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
                <button data-toggle="modal" data-target="#exampleModalLong">ver más</button>
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
	<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Información Profesional</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
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
          sale: "Primera Sesión GRATIS"
        },
        {
          title: "Slide #2",
          content: "Slide content.",
          picProfessional: "img/professionals/Alex_Balada_Carrasco.png",
		  nameProfessional: "Alex Balada Carrasco",
		  titleProfessional: "Psicólogo",
		  priceProfessional: "$30.000",
          promocion: false,
          sale: "¡PROMOCIÓN!"
        },
        {
          title: "Slide #3",
          content: "Slide content.",
          picProfessional: "img/professionals/Claudia_Jeldres_Guajardo.png",
		  nameProfessional: "Claudia Jeldres Guajardo",
		  titleProfessional: "Psicólogo",
		  priceProfessional: "$30.000",
          promocion: false,
          sale: "¡PROMOCIÓN!"
        },
        {
          title: "Slide #4",
          content: "Slide content.",
          picProfessional: "img/professionals/Gabriel_Gonzalez_Salinas.png",
		  nameProfessional: "Gabriel Gonzalez Salinas",
		  titleProfessional: "Psicólogo",
		  priceProfessional: "$30.000",
          promocion: false,
          sale: "¡PROMOCIÓN!"
        },
        {
          title: "Slide #5",
          content: "Slide content.",
          picProfessional: "img/professionals/Sofia_Fiedler_Porzio.png",
		  nameProfessional: "Sofia Fiedler Porzio",
		  titleProfessional: "Psicólogo",
		  priceProfessional: "$30.000",
          promocion: false,
          sale: "¡PROMOCIÓN!"
        }
      ]
    };
  }
};
</script>
