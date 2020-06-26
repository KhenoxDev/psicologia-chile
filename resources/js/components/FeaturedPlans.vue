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
      :transitionSpeed="10000000"
      :visible-slides="3"
      :slide-ratio="1 / 6"
      :dragging-distance="70"
    >
      <vueper-slide v-for="slide in slides" :key="slide.id" :style="'border-radius: ' + ['1rem'] ">
        <template v-slot:content>
		<!-- Campos tabla planes destacados -->
		<div class="card card-body carousel--featuredplans card--featuredplans">
			<div class="col-md-12 price--container">
				<span class="text--price"> {{ slide.price }} </span>
				<span class="text--cantsessions"> {{ slide.cantSes }} </span>
			</div>
			<div class="col-md-12 description--container">
				<span> {{ slide.description }} </span>
			</div>
			<span id="saleid" class="circulo" v-if="slide.promocion">
				<span> {{ slide.sale }} </span>
			</span>
		</div>
		<!-- fin campos tabla planes destacados -->
        </template>
      </vueper-slide>
    </vueper-slides>
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
		  promocion: false,
		  sale: "Promoción!"
        },
/*      {
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
