<template>
  <div id="mainCovenants" class="container mt-4 mb-4">
    <span class="title--section">
      <strong>Empresas</strong> que confiaron en nosotros
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
          image: "img/covenants/banco_chile2.jfif",
          imageDesc: "banco_chile",
          urlCovenants: "#",
        },
        {
          title: "Slide #2",
          content: "Slide content.",
          image: "img/covenants/banco_itau.jfif",
          imageDesc: "banco_itau",
          urlCovenants: "#",
        },
        {
          title: "Slide #3",
          content: "Slide content.",
          image: "img/covenants/dell.png",
          imageDesc: "dell",
          urlCovenants: "#",
        },
        {
          title: "Slide #4",
          content: "Slide content.",
          image: "img/covenants/metrogas.png",
          imageDesc: "metrogas",
          urlCovenants: "#",
        },
        {
          title: "Slide #5",
          content: "Slide content.",
          image: "img/covenants/enel.png",
          imageDesc: "enel",
          urlCovenants: "#",
        },
        {
          title: "Slide #6",
          content: "Slide content.",
          image: "img/covenants/avon.jpg",
          imageDesc: "avon",
          urlCovenants: "#",
        },
        {
          title: "Slide #7",
          content: "Slide content.",
          image: "img/covenants/volvo.jpg",
          imageDesc: "volvo",
          urlCovenants: "#",
        },
        {
          title: "Slide #8",
          content: "Slide content.",
          image: "img/covenants/finning_cat.png",
          imageDesc: "finning_cat",
          urlCovenants: "#",
        },
      ],
    };
  },
};
</script>
