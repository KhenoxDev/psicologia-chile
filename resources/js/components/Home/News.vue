<template>
  <div id="mainNews" class="container mt-4">
    <span class="title--section">
      <strong>Psicología</strong> para ti
    </span>
    <hr class="line--separator" />
    <div v-if="this.news.length > 0">
      <vueper-slides
        :breakpoints="breakpoints"
        class="no-shadow"
        autoplay
        infinite
        bullets-outside
        slide-multiple
        :touchable="false"
      >
        <vueper-slide v-for="(n, i) in news" :index="i" :key="n.id">
          <template v-slot:content>
            <!-- Campos tabla noticias -->
            <news
              :identificator="n.id"
              :image="n.image"
              :title="n.title"
              :content="n.content"
              :autor="n.author"
              :publish="n.posted_on"
            ></news>
            <!-- fin campos tabla noticias -->
          </template>
        </vueper-slide>
      </vueper-slides>
      <div class="seeall--news">
        <a href="/noticias">ver todas las noticias</a>
      </div>
    </div>
    <div v-else class="text-center">
      <span class="h4">No hay noticias publicadas</span>
    </div>
  </div>
</template>
<script>
import { VueperSlides, VueperSlide } from "vueperslides";
import News from "../News/News";

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
          slideRatio: 1 / 4,
          visibleSlides: 2,
          arrows: false,
        },
        1445: {
          slideRatio: 1 / 6,
          visibleSlides: 3,
          arrows: false,
        },
        2561: {
          slideRatio: 1 / 6,
          visibleSlides: 3,
          arrows: false,
        },
      },
      news: [],
    };
  },
  components: {
    News,
  },
  mounted() {
    this.getNews();
  },
  methods: {
    async getNews() {
      const api = this.$store.state.appUrl + "/api/news";

      try {
        let response = await axios.get(api);
        for (let index = 0; index < 6; index++) {
          this.news.push(response.data.data[index]);
        }
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
