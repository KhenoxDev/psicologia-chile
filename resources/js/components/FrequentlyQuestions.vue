<template>
  <div id="mainQuestions" class="container mb-4">
    <span class="title--section">
      <strong>Consultas</strong> frecuentes
    </span>
    <hr class="line--separator" />
    <vueper-slides
      class="no-shadow desktop--questions"
      autoplay
      arrows-outside
      infinite
      :bullets="false"
      :visible-slides="4"
      :slide-ratio="1 / 8"
    >
      <vueper-slide v-for="(slide, i) in slides" :index="i" :key="slide.id" class="test--margin">
        <template v-slot:content>
          <div v-if="i == 0" class="card card-body card--question first-card-faq">
            <span>{{ slide.descFAQ }}</span>
          </div>
          <div v-else class="card card-body card--question another-card-faq">
            <span>{{ slide.descFAQ }}</span>
          </div>
        </template>
      </vueper-slide>
    </vueper-slides>
    <vueper-slides
      class="no-shadow mobile--questions"
      :bullets="false"
      autoplay
      :arrows="false"
      :infinite="false"
      :visible-slides="1"
      :slide-ratio="1 / 2"
      3d
    >
      <vueper-slide v-for="(slide, i) in slides" :index="i" :key="slide.id" class="test--margin">
        <template v-slot:content>
          <!-- Primera tarjeta pintada  -->
          <div v-if="i == 0" class="card card-body card--question first-card-faq">
            <!-- <img class="img-fluid" src="img/faq_interrogacion_primera_pregunta.svg" alt /> -->
            <span>{{ slide.descFAQ }}</span>
          </div>
          <!-- Resto de tarjetas -->
          <div v-else class="card card-body card--question another-card-faq">
            <span>{{ slide.descFAQ }}</span>
          </div>
          <!-- Fin sentencia if -->
        </template>
      </vueper-slide>
    </vueper-slides>
    <div class="seemore--questions">
      <button>ver todas las consultas</button>
    </div>
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
          descFAQ: "Tengo crisis de pánico muy seguido ¿qué puedo hacer?",
          position: "1"
        },
        {
          title: "Slide #2",
          content: "Slide content.",
          descFAQ: "¿Qué es la terapia psicológica online?",
          position: "2"
        },
        {
          title: "Slide #3",
          content: "Slide content.",
          descFAQ:
            "Cómo puedo superar mis miedos, aceptarme y enfrentar la vida",
          position: "3"
        },
        {
          title: "Slide #4",
          content: "Slide content.",
          descFAQ:
            "¿Cuál es la principal diferencia de la terapia online, versus la terapia psicológica tradicional?",
          position: "4"
        },
        {
          title: "Slide #5",
          content: "Slide content.",
          descFAQ: "¿Por qué es más económica?",
          position: "5"
        },
        {
          title: "Slide #6",
          content: "Slide content.",
          descFAQ: "¿Cómo es la confidencialidad de la terapia?",
          position: "6"
        },
        {
          title: "Slide #7",
          content: "Slide content.",
          descFAQ:
            "¿Cómo es el proceso de selección de nuestros profesionales?",
          position: "7"
        }
      ]
    };
  }
};
</script>
