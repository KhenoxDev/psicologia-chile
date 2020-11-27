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
      :img-background="
        this.mainBanner.length > 0 ? this.mainBanner[0].element : imgBackground
      "
      :url-vid="
        this.mainVideo.length > 0
          ? this.mainVideo[0].element
          : 'https://www.youtube.com/embed/TrREbV49fuU'
      "
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
import { mapState } from "vuex";
import { setTimeout } from "timers";

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
  created() {
    this.$store.dispatch("loadMainPopup");
    this.$store.dispatch("loadMainBanner");
    this.$store.dispatch("loadMainVideo");
    this.$store.dispatch("loadMainLogo");
    this.$store.commit("setAppUrl", this.appUrl);
  },
  mounted() {
    this.onLoad();
    setTimeout(() => {
      if (this.mainPopup.length > 0) {
        this.$swal({
          width: 800,
          imageWidth: "100%",
          imageUrl: this.mainPopup[0].element,
          imageAlt: this.mainPopup[0].module,
          showConfirmButton: false,
          showCloseButton: true,
        });
        const url = this.mainPopup[0].url;

        if (url !== null) {
          $(".swal2-image").css("cursor", "pointer");
          $(".swal2-image").click(function () {
            window.open(url, "_blank");
          });
        }
      }
    }, 2000);
  },
  methods: {
    onLoad() {
      this.isLoading = true;
      setTimeout(() => {
        this.isLoading = false;
      }, 2000);
    },
  },
  computed: mapState(["mainPopup", "mainVideo", "mainBanner"]),
};
</script>
