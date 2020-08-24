<template>
  <div id="mainQuestions" class="container mb-4">
    <span class="title--section">
      <strong>Consultas</strong> frecuentes
    </span>
    <hr class="line--separator" />
    <vueper-slides
      class="no-shadow"
      :autoplay="false"
      bullets-outside
      slide-multiple
      infinite
      3d
      :touchable="false"
      :breakpoints="breakpoints"
    >
      <vueper-slide v-for="(slide, i) in slides" :index="i" :key="slide.id">
        <template v-slot:content>
          <div v-if="i == 0" class="card card-body card--question first-card-faq">
            <span class="description">{{ slide.descFAQ }}</span>
            <!-- <span class="comments">
              <i class="far fa-comment-dots"></i>
              {{ slide.comments }}
            </span>-->
          </div>
          <div v-else class="card card-body card--question another-card-faq">
            <span class="description">{{ slide.descFAQ }}</span>
            <!-- <span class="comments">
              <i class="far fa-comment-dots"></i>
              {{ slide.comments }}
            </span>-->
          </div>
        </template>
      </vueper-slide>
    </vueper-slides>
    <div class="seemore--questions">
      <!-- <button>ver todas las consultas</button> -->
      <a :href="'preguntas-frecuentes/'">ver todas las consultas</a>
    </div>
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
          arrows: false,
        },
        376: {
          slideRatio: 1 / 2,
          visibleSlides: 1,
          arrows: false,
        },
        426: {
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
          slideRatio: 1 / 6,
          visibleSlides: 3,
          arrows: false,
        },
        1445: {
          slideRatio: 1 / 8,
          visibleSlides: 4,
          arrows: false,
        },
        2561: {
          slideRatio: 1 / 8,
          visibleSlides: 4,
          arrows: false,
        },
      },
      slides: [
        {
          descFAQ: "Tengo crisis de pánico muy seguido ¿qué puedo hacer?",
          comments: 100,
        },
        {
          descFAQ: "¿Qué es la terapia psicológica online?",
          comments: 109,
        },
        {
          descFAQ:
            "Cómo puedo superar mis miedos, aceptarme y enfrentar la vida",
          comments: 2,
        },
        {
          descFAQ:
            "¿Cuál es la principal diferencia de la terapia online, versus la terapia psicológica tradicional?",
          comments: 6,
        },
        {
          descFAQ: "¿Por qué es más económica?",
          comments: 4,
        },
        {
          descFAQ: "¿Cómo es la confidencialidad de la terapia?",
          comments: 32,
        },
        {
          descFAQ:
            "¿Cómo es el proceso de selección de nuestros profesionales?",
          comments: 34,
        },
      ],
    };
  },
};
</script>

