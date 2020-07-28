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
      <banner banner-identification="mainProfessional--banner" banner-title="Profesionales"></banner>
    </div>
  </div>
</template>

<script>
import LoadingComponent from "vue-loading-overlay";
import Banner from "../Reusable/Banner";

export default {
  data() {
    return {
      isLoading: true,
      fullPage: true,
      professionals: [],
    };
  },
  components: {
    LoadingComponent,
    Banner,
  },
  mounted() {
    this.onLoad();
    this.getProfessionals();
  },
  methods: {
    onLoad() {
      this.isLoading = true;
      setTimeout(() => {
        this.isLoading = false;
      }, 2000);
    },
    getProfessionals() {
      axios
        .get("https://online.psicologiachile.cl/gateway-json.php?service=staff")
        .then((response) => {
          this.professionals = response.data.items;
        })
        .catch((e) => {
          console.log(e);
        });
    },
  },
};
</script>
