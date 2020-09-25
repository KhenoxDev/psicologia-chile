<template>
  <div id="mainQuestions" class="container mb-4">
    <span class="title--section">
      <strong>Consultas</strong> frecuentes
    </span>
    <hr class="line--separator" />
    <vueper-slides
      class="no-shadow"
      autoplay
      bullets-outside
      slide-multiple
      infinite
      3d
      :touchable="false"
      :breakpoints="breakpoints"
    >
      <vueper-slide v-for="(faq, i) in questions" :index="i" :key="faq.id">
        <template v-slot:content>
          <div v-if="i == 0" class="card card-body card--question first-card-faq">
            <span class="description">{{ faq.title }}</span>
          </div>
          <div v-else class="card card-body card--question another-card-faq">
            <span class="description">{{ faq.title }}</span>
          </div>
        </template>
      </vueper-slide>
    </vueper-slides>
    <div class="seemore--questions">
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
      questions: [],
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
    };
  },
  mounted() {
    this.getQuestions();
  },
  methods: {
    async getQuestions() {
      const api = this.$store.getters.getAppUrl + "/api/questions";

      try {
        let response = await axios.get(api);
        for (let index = 0; index < 8; index++) {
          this.questions.push(response.data.data[index]);
        }
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>

