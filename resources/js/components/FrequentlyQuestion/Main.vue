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
    <div class="bg--section bg--questions-banner">
      <banner
        banner-identification="mainQuestion--banner"
        banner-title-bkg="../../../img/global/burbuja_1.svg"
        banner-title="Consultas"
      ></banner>
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
            <div class="card-body">
              <p v-html="faq.answer"></p>
              <hr />
              <a
                href="#"
                data-target="#modalQuestion"
                data-toggle="modal"
              >¿Te sirvió esta respuesta?</a>
            </div>
          </div>
        </div>
      </div>
      <div
        class="modal fade"
        id="modalQuestion"
        tabindex="-1"
        role="dialog"
        aria-labelledby="modalQuestionTitle"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Contáctanos!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="support-container">
                <newsletter-form></newsletter-form>
                <register-form></register-form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LoadingComponent from "vue-loading-overlay";
import Banner from "../Reusable/Banner";

import NewsletterForm from "../Global/Newsletter";
import RegisterForm from "../Global/Register";

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
    NewsletterForm,
    RegisterForm,
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
