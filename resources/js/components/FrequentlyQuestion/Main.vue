<template>
  <div class="vld-parent">
    <transition>
      <loading-component
        :active.sync="isLoading"
        :is-full-page="fullPage"
        :opacity="100"
        v-bind:color="'#f4b034'"
      ></loading-component>
    </transition>
    <div class="bg--section bg--professional-banner">
      <banner banner-identification="mainQuestion--banner" banner-title="Preguntas Frecuentes"></banner>
    </div>
    <div id="list--questions" class="container pt-4">
      <!-- Inicio Acordeón FAQ-->
      <div class="accordion" id="accordionExample">
        <div class="card" v-for="faq in questions" :key="faq.id">
          <div id="headingOne" class="card-header card--header--style">
            <button
              class="btn btn-block text-left"
              type="btn pointer"
              data-toggle="collapse"
              :data-target="'#collapse' + faq.id"
              aria-expanded="false"
              aria-controls="collapseOne"
            >
              <i class="fas fa-plus"></i>
              <i class="fas fa-minus"></i>
              {{ faq.title }}
            </button>
          </div>

          <div
            :id="'collapse' + faq.id"
            class="collapse hide"
            aria-labelledby="headingOne"
            data-parent="#accordionExample"
          >
            <div class="card-body">{{ faq.answer }}</div>
          </div>
        </div>
      </div>
      <!-- Fin Acordeón FAQ -->
    </div>
  </div>
</template>

<script>
import LoadingComponent from "vue-loading-overlay";
import Banner from "../Reusable/Banner";

export default {
  props: {
    urlApi: {
      type: String,
    },
  },
  data() {
    return {
      isLoading: true,
      fullPage: true,
      questions: [],
      sortKey: "desc",
    };
  },
  components: {
    LoadingComponent,
    Banner,
  },
  mounted() {
    this.onLoad();
    this.getQuestions();
  },
  methods: {
    onLoad() {
      this.isLoading = true;
      setTimeout(() => {
        this.isLoading = false;
      }, 2000);
    },
    async getQuestions() {
      this.questions = [];
      const api = this.urlApi + "/" + this.sortKey;

      try {
        let response = await axios.get(api);
        for (let index = 0; index < response.data.data.length; index++) {
          this.questions.push(response.data.data[index]);
        }
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
