<template>
  <div class="vld-parent">
    <transition transition>
      <loading-component
        :active.sync="isLoading"
        :is-full-page="fullPage"
        :opacity="100"
        v-bind:color="'#f4b034'"
      ></loading-component>
    </transition>
    <div class="bg--section bg--about-banner">
      <banner></banner>
    </div>
  </div>
</template>

<script>
import LoadingComponent from "vue-loading-overlay";
import Banner from "./Banner";

export default {
  data() {
    return {
      isLoading: true,
      fullPage: true,
    };
  },
  components: {
    LoadingComponent,
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
