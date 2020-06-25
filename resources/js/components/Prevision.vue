<template>
  <div class="container-fluid">
    <span class="title--section">Previsión</span>
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
    >
      <vueper-slide v-for="slide in slides" :key="slide.id" :style="'margin-bottom:' + ['1rem']">
        <template v-slot:content>
          <div class="card card-body carousel--prevision card-prevision">
            <img class="img-fluid" :src="slide.image" :alt="slide.imageDesc" />
          </div>
        </template>
      </vueper-slide>
    </vueper-slides>
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
          image: "img/Logo_Banmedica.png",
          imageDesc: "Banmedica"
        },
        {
          title: "Slide #2",
          content: "Slide content.",
          image: "img/Logo_Fonasa.svg",
          imageDesc: "Fonasa"
        },
        {
          title: "Slide #3",
          content: "Slide content.",
          image: "img/Logo_Colmena_2.jpg",
          imageDesc: "Colmena"
        },
        {
          title: "Slide #4",
          content: "Slide content.",
          image: "img/Logo_Masvida.png",
          imageDesc: "Masvida"
        },
        {
          title: "Slide #5",
          content: "Slide content.",
          image: "img/Logo_Cruz_Blanca.png",
          imageDesc: "Cruzblanca"
        },
        {
          title: "Slide #6",
          content: "Slide content.",
          image: "img/Logo_Consalud.png",
          imageDesc: "Consalud"
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
