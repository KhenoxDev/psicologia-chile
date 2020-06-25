<template>
  <div class="container-fluid mt-4">
    <span class="title--section">Planes destacados</span>
    <hr class="line--separator" />
    <vueper-slides
      class="no-shadow"
      :bullets="false"
      :autoplay="true"
      :arrows="false"
      :infinite="true"
      :transitionSpeed="100"
      :visible-slides="3"
      :slide-ratio="1 / 8"
      :dragging-distance="70"
    >
      <vueper-slide v-for="slide in slides" :key="slide.id">
        <template v-slot:content>
          <div class="card card-body carousel--featuredplans card-featuredplans">
            <span class="texto-encima-featuredplans text-price"> {{ slide.price }} </span>
			<span class="texto-encima-featuredplans text-cantses"> {{ slide.cantSes }} </span>
			<span class="texto-encima-featuredplans text-description"> {{ slide.description }} </span>
			<!-- Imagen promocion -->

			<span id="saleid" class="circulo" v-if="slide.promocion">
				<span> {{ slide.sale }} </span>
			</span>

          </div>
        </template>
      </vueper-slide>
    </vueper-slides>
	<br><br>
  </div>
</template>
<script>
import { VueperSlides, VueperSlide } from "vueperslides";

export default {
  components: { VueperSlides, VueperSlide },
  data() {
    return {
      slides: [
        {
          title: "Slide #1",
          content: "Slide content.",
		  price: "$14.490 c/sesión",
		  cantSes: "5 Sesiones",
		  description: "En este plan ingresan psicologos seleccionados para dar un servicio de calidad a un precio accesible.",
		  promocion: true,
		  sale: "Promoción!"
        },
        {
          title: "Slide #2",
		  content: "Slide content.",
		  price: "$12.490 c/sesión",
		  cantSes: "4 Sesiones",
		  description: "En este plan ingresan psicologos seleccionados para dar un servicio de calidad a un precio accesible.",
		  promocion: false,
		  sale: "Promoción!"
        },
        {
          title: "Slide #3",
		  content: "Slide content.",
		  price: "$17.490 c/sesión",
		  cantSes: "3 Sesiones",
		  description: "En este plan ingresan psicologos seleccionados para dar un servicio de calidad a un precio accesible.",
		  promocion: true,
		  sale: "Promoción!"
        },
/*         {
          title: "Slide #4",
          content: "Slide content."
        },
        {
          title: "Slide #5",
          content: "Slide content."
        },
        {
          title: "Slide #6",
          content: "Slide content."
        },
        {
          title: "Slide #7",
          content: "Slide content."
        } */
      ]
    };
  }
};
</script>
