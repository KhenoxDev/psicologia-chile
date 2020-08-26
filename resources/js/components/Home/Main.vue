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
    <masthead
      :img-background="imgBackground"
      url-vid="https://www.youtube.com/embed/R6zFANXg7Zo?autoplay=1&mute=1&playlist=R6zFANXg7Zo&loop=1"
    ></masthead>
    <div class="bg--white">
      <news></news>
      <video-component></video-component>
    </div>
    <div class="bg--gray">
      <specialists></specialists>
    </div>
    <div class="bg--white">
      <featured-plans></featured-plans>
      <featured-professionals></featured-professionals>
      <prevision></prevision>
      <covenants></covenants>
      <were-news></were-news>
    </div>
    <div class="bg--gray">
      <frequently-questions></frequently-questions>
    </div>
  </div>
</template>

<script>
import LoadingComponent from "vue-loading-overlay";
import Masthead from "./Masthead";
import VideoComponent from "./Video";
import Prevision from "./Prevision";
import Specialists from "./Specialists";
import FeaturedPlans from "./FeaturedPlans";
import FeaturedProfessionals from "./FeaturedProfessionals";
import FrequentlyQuestions from "./FrequentlyQuestions";
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
    VideoComponent,
    Prevision,
    Specialists,
    FeaturedPlans,
    FeaturedProfessionals,
    FrequentlyQuestions,
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
