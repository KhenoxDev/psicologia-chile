<template>
  <div id="mainWeWereNews" class="container mt-4 mb-4">
    <span class="title--section">
      <strong>Fuimos</strong> noticia
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
          <div class="card--wewerenews">
            <a :href="slide.urlNews" target="_blank">
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
          arrows: false
        },
        376: {
          slideRatio: 1 / 2,
          visibleSlides: 1,
          arrows: false
        },
        426: {
          slideRatio: 1 / 2,
          visibleSlides: 1,
          arrows: false
        },
        769: {
          slideRatio: 1 / 4,
          visibleSlides: 2,
          arrows: false
        },
        1025: {
          slideRatio: 1 / 6,
          visibleSlides: 3,
          arrows: false
        },
        1445: {
          slideRatio: 1 / 8,
          visibleSlides: 4,
          arrows: false
        },
        1921: {
          slideRatio: 1 / 8,
          visibleSlides: 4,
          arrows: false
        },
        2561: {
          slideRatio: 1 / 8,
          visibleSlides: 4,
          arrows: false
        }
      },
      slides: [
        {
          title: "Slide #1",
          content: "Slide content.",
          image: "img/we_were_news/canal_mega.jpg",
          imageDesc: "mega",
          urlNews: "https://www.mega.cl/home/"
        },
        {
          title: "Slide #2",
          content: "Slide content.",
          image: "img/we_were_news/canal_tvn.png",
          imageDesc: "tvn",
          urlNews: "https://www.tvn.cl/"
        },
        {
          title: "Slide #3",
          content: "Slide content.",
          image: "img/we_were_news/canal_trece.jpg",
          imageDesc: "trece",
          urlNews: "https://www.13.cl/"
        },
        {
          title: "Slide #4",
          content: "Slide content.",
          image: "img/we_were_news/canal_chilevision2.png",
          imageDesc: "chilevision",
          urlNews: "https://www.chilevision.cl/"
        },
        {
          title: "Slide #5",
          content: "Slide content.",
          image: "img/we_were_news/canal_chilevision2.png",
          imageDesc: "chilevision",
          urlNews: "https://www.chilevision.cl/"
        }
      ]
    };
  }
};
</script>
