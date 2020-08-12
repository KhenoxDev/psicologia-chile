<template>
  <div>
    <transition>
      <loading-component
        :active.sync="isLoading"
        :is-full-page="fullPage"
        :opacity="100"
        v-bind:color="'#f4b034'"
      ></loading-component>
    </transition>
    <div class="bg--section bg--professional-banner">
      <banner banner-identification="mainProfessional--banner" banner-title="Profesionales"></banner>
    </div>
    <div class="bg--section bg--white">
      <news image="img/news/news_autoestima.jpg"></news>
    </div>
  </div>
</template>
<script>
import News from "./News";
import LoadingComponent from "vue-loading-overlay";
import Banner from "../Reusable/Banner";

export default {
  components: {
    News,
    LoadingComponent,
    Banner,
  },
};
</script>
