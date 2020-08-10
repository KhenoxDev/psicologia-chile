<template>
  <div id="mainNews" class="container mt-4">
    <span class="title--section">
      <strong>Psicología</strong> para ti
    </span>
    <hr class="line--separator" />
    <vueper-slides
      :breakpoints="breakpoints"
      class="no-shadow"
      :autoplay="off"
      infinite
      bullets-outside
      slide-multiple
      :touchable="false"
    >
      <vueper-slide v-for="(slide, i) in slides" :index="i" :key="slide.id">
        <template v-slot:content>
          <!-- Campos tabla noticias -->
          <div class="card card-body card--featurednews">
            <div class="img--container">
              <img class="img-fluid border--picnews" :src="slide.newsPic" :alt="slide.newsName" />
            </div>
            <div v-if="i == 0" class="wave--container--first">
              <span id="spanDate">{{ slide.newsDate }}</span>
              <span id="spanText">{{ slide.newsText }}</span>
              <div class="news--autor">
                <span>- {{ slide.newsAutor }}</span>
              </div>
              <span class="span--comment">
                <i class="far fa-comment-dots"></i>
                {{ slide.countComments }}
              </span>
              <span class="span--like">
                <i class="far fa-thumbs-up"></i>
                {{ slide.countLikes }}
              </span>
            </div>
            <div v-else class="wave--container--another">
              <span id="spanDate">{{ slide.newsDate }}</span>
              <span id="spanText">{{ slide.newsText }}</span>
              <div class="news--autor">
                <span>- {{ slide.newsAutor }}</span>
              </div>
              <span class="span--comment">
                <i class="far fa-comment-dots"></i>
                {{ slide.countComments }}
              </span>
              <span class="span--like">
                <i class="far fa-thumbs-up"></i>
                {{ slide.countLikes }}
              </span>
            </div>
            <div class="seemore--news">
              <button>
                continuar leyendo
                <em class="fa fa-arrow-right"></em>
              </button>
            </div>
          </div>
          <!-- fin campos tabla noticias -->
        </template>
      </vueper-slide>
    </vueper-slides>
    <div class="seeall--news">
      <button>ver todas las noticias</button>
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
          visibleSlides: 1,
          arrows: false,
        },
        991: {
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
          slideRatio: 1 / 4,
          visibleSlides: 3,
          arrows: false,
        },
        2561: {
          slideRatio: 1 / 4,
          visibleSlides: 3,
          arrows: false,
        },
      },
      slides: [
        {
          title: "Slide #1",
          content: "Slide content.",
          newsPic: "img/news/news_born.jpg",
          newsName: "news_born",
          newsDate: "8 de abril de 2020",
          newsText: "El Síndrome de Burn Out.",
          newsAutor: "Evo",
          countComments: "3",
          countLikes: "5",
        },
        {
          title: "Slide #2",
          content: "Slide content.",
          newsPic: "img/news/news_autoestima.jpg",
          newsName: "news_autoestima",
          newsDate: "9 de abril de 2020",
          newsText: "La Autoestima y el Autoconocimiento.",
          newsAutor: "Matias",
          countComments: "0",
          countLikes: "1",
        },
        {
          title: "Slide #3",
          content: "Slide content.",
          newsPic: "img/news/news_lenguaje.png",
          newsName: "news_lenguaje",
          newsDate: "10 de abril de 2020",
          newsText: "El Lenguaje Humano.",
          newsAutor: "Matias",
          countComments: "0",
          countLikes: "2",
        },
        {
          title: "Slide #4",
          content: "Slide content.",
          newsPic: "img/news/news_cerebro.jpeg",
          newsName: "news_cerebro",
          newsDate: "11 de abril de 2020",
          newsText: "Expertos Advierten Una Ola De Trastornos Postpandemia.",
          newsAutor: "Matias",
          countComments: "0",
          countLikes: "0",
        },
        {
          title: "Slide #5",
          content: "Slide content.",
          newsPic: "img/news/news_piedras.png",
          newsName: "news_piedras",
          newsDate: "12 de abril de 2020",
          newsText: "Lorem ipsum dolor sit amet.",
          newsAutor: "Matias",
          countComments: "0",
          countLikes: "0",
        },
      ],
    };
  },
};
</script>
