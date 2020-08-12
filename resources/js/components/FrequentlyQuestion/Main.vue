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
      <banner banner-identification="mainQuestion--banner" banner-title="FAQ"></banner>
    </div>
    <div class="container pt-4">
      <ul class="list--question">
        <li
          class="list--specialist-item"
          v-for="faq in questions"
          :key="faq.id"
        >{{ faq.title }} - {{ faq.answer }}</li>
      </ul>
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
