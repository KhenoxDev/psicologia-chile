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
      :transitionSpeed="400"
      :visible-slides="3"
      :slide-ratio="1 / 6"
	  :dragging-distance="200"
    >
      <vueper-slide v-for="slide in slides" :key="slide.id">
        <template v-slot:content>
		<!-- Campos tabla planes destacados -->
		<div class="card card-body carousel--featuredplans card--featuredplans">
			<div class="col-md-12 price--container" style="border-radius: 4px 4px 0px 0px;">
				<span class="text--price"> {{ slide.price }} </span>
				<span class="text--cantsessions"> {{ slide.cantSes }} </span>
			</div>
			<div class="col-md-12 description--container" style="border-radius: 0px 0px 4px 4px;">
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
		  sale: "¡PROMOCIÓN!"
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
		{
          title: "Slide #4",
		  content: "Slide content.",
		  price: "$00.000 c/sesión",
		  cantSes: "0 Sesiones",
		  description: "En este plan ingresan psicologos seleccionados para dar un servicio de calidad a un precio accesible.",
		  promocion: true,
		  sale: "¡PROXIMAMENTE!"
		},
		{
          title: "Slide #5",
		  content: "Slide content.",
		  price: "$00.000 c/sesión",
		  cantSes: "0 Sesiones",
		  description: "En este plan ingresan psicologos seleccionados para dar un servicio de calidad a un precio accesible.",
		  promocion: true,
		  sale: "¡PROXIMAMENTE!"
        },

      ]
    };
  }
};
</script>
