<template>
  <div id="mainCovenants" class="container mt-4 mb-4">
    <span class="title--section">
      <strong>Con</strong>venios
    </span>
    <hr class="line--separator" />
    <vueper-slides
      class="no-shadow"
      :breakpoints="breakpoints"
      bullets-outside
      :autoplay="false"
      infinite
      slide-multiple
      :touchable="false"
    >
      <vueper-slide v-for="slide in slides" :key="slide.id" :style="'margin-bottom:' + ['1rem']">
        <template v-slot:content>
          <!-- card card-body -->
          <div class="card--covenants">
            <a :href="slide.urlCovenants" target="_blank">
              <img class="img-fluid" :src="slide.image" :alt="slide.imageDesc" />
            </a>
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
        768: {
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
        1921: {
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
          title: "Slide #1",
          content: "Slide content.",
          image: "img/covenants/banco_chile3.png",
          imageDesc: "banco_chile",
          urlCovenants: "#",
        },
        {
          title: "Slide #2",
          content: "Slide content.",
          image: "img/covenants/banco_security.jpg",
          imageDesc: "banco_security",
          urlCovenants: "#",
        },
        {
          title: "Slide #3",
          content: "Slide content.",
          image: "img/covenants/banco_itau3.png",
          imageDesc: "banco_itau",
          urlCovenants: "#",
        },
        {
          title: "Slide #4",
          content: "Slide content.",
          image: "img/covenants/colegio_psicologos2.jpg",
          imageDesc: "colegio_psicologos",
          urlCovenants: "#",
        },
        {
          title: "Slide #5",
          content: "Slide content.",
          image: "img/covenants/claro.png",
          imageDesc: "claro",
          urlCovenants: "#",
        },

        {
          title: "Slide #6",
          content: "Slide content.",
          image: "img/covenants/sky.png",
          imageDesc: "sky",
          urlCovenants: "#",
        },
        {
          title: "Slide #7",
          content: "Slide content.",
          image: "img/covenants/fldsmith.png",
          imageDesc: "fldsmith",
          urlCovenants: "#",
        },
        {
          title: "Slide #8",
          content: "Slide content.",
          image: "img/covenants/achs3.png",
          imageDesc: "achs",
          urlCovenants: "#",
        },
      ],
    };
  },
};
</script>
