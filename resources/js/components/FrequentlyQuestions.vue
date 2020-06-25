<template>
  <div class="container-fluid mt-4">
    <span class="title--section">Consultas frecuentes</span>
    <hr class="line--separator" />
    <vueper-slides
      class="no-shadow"
      :bullets="false"
      :autoplay="true"
      :arrows="false"
      :infinite="true"
      :transitionSpeed="100"
      :visible-slides="4"
      :slide-ratio="1 / 8"
      :dragging-distance="70"
    >
      <vueper-slide v-for="slide in slides" :key="slide.id" :style="'margin-bottom:' + ['1rem']">
        <template v-slot:content>
          <div class="card card-body carousel--prevision first-card-faq">
            <img class="img-fluid" src="img/faq_interrogacion_primera_pregunta5.svg" alt />
            <div class="texto-encima33">
              Tengo crisis de pánico muy seguido
              <br />¿qué puedo hacer?
            </div>
            <div class></div>
          </div>
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
          content: "Slide content."
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
