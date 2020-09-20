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
    <div
      class="modal fade"
      id="modalInfo"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modalInfoTitle"
      aria-hidden="true"
      ref="popupinfo"
    >
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <img :src="mainPopup[0].element" :alt="mainPopup[0].module" />
          </div>
        </div>
      </div>
    </div>
    <div v-if="mainBanner.length > 0 && mainVideo.length > 0">
      <masthead :img-background="mainBanner[0].element" :url-vid="mainVideo[0].element"></masthead>
    </div>
    <div v-if="mainVideo.length > 0 && mainBanner.lenght == 0">
      <masthead :img-background="imgBackground" :url-vid="mainVideo[0].element"></masthead>
    </div>
    <div v-if="mainBanner.length > 0 && mainVideo.length == 0">
      <masthead
        :img-background="mainBanner[0].element"
        url-vid="https://www.youtube.com/embed/TrREbV49fuU?autoplay=1&mute=1&playlist=TrREbV49fuU&loop=1"
      ></masthead>
    </div>
    <div v-else>
      <masthead
        :img-background="imgBackground"
        url-vid="https://www.youtube.com/embed/TrREbV49fuU?autoplay=1&mute=1&playlist=TrREbV49fuU&loop=1"
      ></masthead>
    </div>
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
import { mapState } from "vuex";

export default {
  props: {
    imgBackground: {
      type: String,
    },
    appUrl: {
      type: String,
    },
  },
  data() {
    return {
      isLoading: true,
      fullPage: true,
      linkVideo: "",
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
    this.$store.commit("setAppUrl", this.appUrl);
    this.$store.dispatch("loadMainVideo");
    this.$store.dispatch("loadMainBanner");
    this.$store.dispatch("loadMainPopup");
    this.openAuto();
  },
  methods: {
    onLoad() {
      this.isLoading = true;
      setTimeout(() => {
        this.isLoading = false;
      }, 2000);
    },
    openAuto() {
      this.$refs["popupinfo"].show();
    },
  },
  computed: mapState(["mainVideo", "mainBanner", "mainPopup"]),
};
</script>
