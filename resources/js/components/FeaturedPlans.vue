<template>
  <div class="container-fluid">
    <span class="title--section">Planes Destacados</span>
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
            <img class="img-fluid" src="img/Planes_destacados_fondo2.jpg" alt />
            <div class="texto-encima55">
				asdadad
            </div>
            <div class></div>
          </div>
        </template>
      </vueper-slide>
    </vueper-slides>
	<br><br>
  </div>
</template>
<script>
import { VueperSlides, VueperSlide } from "vueperslides";
import "vueperslides/dist/vueperslides.css";

export default {
  components: { VueperSlides, VueperSlide },
  data() {
    return {
      slides: [
        {
          title: "Slide #1",
		  content: "Slide content.",
		  price: "$14.990"
        },
        {
          title: "Slide #2",
		  content: "Slide content."
        },
        {
          title: "Slide #3",
		  content: "Slide content."
        },
        {
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
        }
      ]
    };
  }
};
</script>
