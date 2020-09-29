<template>
  <div id="mainCovenants" class="container mt-4 mb-4">
    <span class="title--section"> <strong>Con</strong>venios </span>
    <hr class="line--separator" />
    <vueper-slides
      class="no-shadow"
      :breakpoints="breakpoints"
      bullets-outside
      autoplay
      infinite
      slide-multiple
      :touchable="false"
    >
      <vueper-slide
        v-for="slide in slides"
        :key="slide.id"
        :style="'margin-bottom:' + ['1rem']"
      >
        <template v-slot:content>
          <!-- card card-body -->
          <div class="card--covenants">
            <a
              href="javascript:void(0)"
              target="_blank"
              @click="getAgreement(slide.id)"
              data-toggle="modal"
              data-target="#modalConvenant"
            >
              <img class="img-fluid" :src="slide.img" :alt="slide.title" />
            </a>
          </div>
        </template>
      </vueper-slide>
    </vueper-slides>
    <div
      class="modal fade"
      id="modalConvenant"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modalConvenantLabel"
      aria-hidden="true"
    >
      <div
        v-if="agreementSelected.length > 0"
        class="modal-dialog"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalConvenantLabel">
              {{ agreementSelected[0].title }}
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- <span class="h4">Descripción</span>
						<hr /> -->
            <p v-html="agreementSelected[0].description"></p>
            <!-- <span class="h4">¿Cómo funciona?</span>
            <hr />
            <p v-html="agreementSelected[0].conditions"></p>
            <a
              :href="this.$store.getters.getAppUrl + agreementSelected[0].doc"
              target="_blank"
              rel="noopener noreferrer"
              >Términos y condiciones</a
            > -->
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Cerrar
            </button>
          </div>
        </div>
      </div>
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
      slides: [],
      agreementSelected: [],
    };
  },
  mounted() {
    this.getAgreements();
  },
  methods: {
    async getAgreements() {
      const api = this.$store.getters.getAppUrl + "/api/agreement";

      try {
        let response = await axios.get(api);
        for (let index = 0; index < response.data.length; index++) {
          this.slides.push(response.data[index]);
        }
      } catch (error) {
        console.log(error);
      }
    },
    getAgreement(id) {
      this.agreementSelected = [];
      let aux = this.slides.find(function (item) {
        return item.id == id;
      });

      console.log(aux);

      this.agreementSelected.push(aux);
    },
  },
  computed: {},
};
</script>
