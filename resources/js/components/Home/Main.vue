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
    <masthead :img-background="imgBackground"></masthead>
    <div class="bg--white">
      <three-steps></three-steps>
      <prevision></prevision>
      <were-news></were-news>
      <covenants></covenants>
    </div>
    <div class="bg--gray">
      <specialists></specialists>
    </div>
    <div class="bg--white">
      <featured-plans></featured-plans>
      <featured-professionals></featured-professionals>
    </div>
    <div class="bg--gray">
      <frequently-questions></frequently-questions>
    </div>
    <div class="bg--voluntary">
      <voluntary></voluntary>
    </div>
    <div class="bg--white">
      <news></news>
    </div>
  </div>
</template>

<script>
import LoadingComponent from "vue-loading-overlay";
import Masthead from "./Masthead";
import ThreeSteps from "./ThreeSteps";
import Prevision from "./Prevision";
import Specialists from "./Specialists";
import FeaturedPlans from "./FeaturedPlans";
import FeaturedProfessionals from "./FeaturedProfessionals";
import FrequentlyQuestions from "./FrequentlyQuestions";
import Voluntary from "./Voluntary";
import News from "./News";
import WereNews from "./WeWereNews";
import Covenants from "./Covenants";

export default {
  props: {
    imgBackground: {
      type: String,
    },
  },
  data() {
    return {
      isLoading: true,
      fullPage: true,
    };
  },
  components: {
    LoadingComponent,
    Masthead,
    ThreeSteps,
    Prevision,
    Specialists,
    FeaturedPlans,
    FeaturedProfessionals,
    FrequentlyQuestions,
    Voluntary,
    News,
    WereNews,
    Covenants,
  },
  mounted() {
    this.onLoad();
  },
  methods: {
    onLoad() {
      this.isLoading = true;
      setTimeout(() => {
        this.isLoading = false;
      }, 2000);
    },
  },
};
</script>
