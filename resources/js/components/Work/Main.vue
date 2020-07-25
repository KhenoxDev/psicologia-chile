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
    <navbar></navbar>
    <whatsapp></whatsapp>
    <div class="bg--work-banner">
      <banner></banner>
    </div>
  </div>
</template>

<script>
import LoadingComponent from "vue-loading-overlay";
import Navbar from "../Home/Navbar";
import Whatsapp from "../Home/Whatsapp";
import Banner from "./Banner.vue";

export default {
  data() {
    return {
      isLoading: true,
      fullPage: true,
    };
  },
  components: {
    LoadingComponent,
    Navbar,
    Whatsapp,
    Banner,
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
