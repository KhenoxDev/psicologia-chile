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
    <vodal
      v-if="this.mainPopup.length > 0"
      :show="show"
      @hide="show = false"
      :width="650"
      :height="570"
      :duration="400"
      animation="rotate"
    >
      <div
        class="light-box"
        :style="'background-image: url(' + this.mainPopup[0].element + ')'"
      ></div>
    </vodal>
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
import Vodal from "vodal";
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
      show: false,
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
    Vodal,
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
        this.show = true;
      }

      const url = this.mainPopup[0].url;

      if (url !== null) {
        $(".light-box").css("cursor", "pointer");
        $(".light-box").click(function () {
          window.open(url, "_blank");
        });
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
<style lang="scss">
@import "~vodal/common.css";
@import "~vodal/rotate.css";

.vodal-dialog {
  background: transparent;
  box-shadow: unset;

  .vodal-close {
    top: 22px;
    right: 22px;
  }
}

.light-box {
  border-radius: 14px !important;
  background-repeat: no-repeat !important;
  background-size: cover !important;
  background-position: center !important;
  height: 100% !important;
}

@media (max-width: 767px) {
  .vodal-dialog {
    width: 84% !important;
    height: auto !important;
    max-height: 65% !important;
  }
}

@media (max-width: 320px) {
  .vodal-dialog {
    width: 84% !important;
    height: auto !important;
    max-height: 28% !important;
  }
}

@media only screen and (min-width: 321px) and (max-width: 425px) {
  .vodal-dialog {
    width: 84% !important;
    height: auto !important;
    max-height: 35% !important;
  }
}

@media only screen and (min-width: 426px) and (max-width: 500px) {
  .vodal-dialog {
    width: 84% !important;
    height: auto !important;
    max-height: 42% !important;
  }
}

@media only screen and (min-width: 501px) and (max-width: 620px) {
  .vodal-dialog {
    width: 84% !important;
    height: auto !important;
    max-height: 50% !important;
  }
}

@media only screen and (min-width: 621px) and (max-width: 700px) {
  .vodal-dialog {
    width: 84% !important;
    height: auto !important;
    max-height: 60% !important;
  }
}
</style>
