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
    <div class="bg--white bg--flex">
      <professional
        v-for="professional in professionals"
        :key="professional.id"
        v-bind:photo="professional.foto"
        v-bind:name-professional="professional.nombreCompleto"
        v-bind:title-professional="professional.profesion"
      ></professional>
    </div>
  </div>
</template>

<script>
import LoadingComponent from "vue-loading-overlay";
import Banner from "../Reusable/Banner";
import Professional from "./Professional";

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
    Professional,
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
          /* this.professionals.forEach((element) => {
            element.profesion = substr(element.profesion, 1, 4);
          }); */
          console.log(this.professionals);
        })
        .catch((e) => {
          console.log(e);
        });
    },
    /* getSubstr: function (value) {
      return substr(value, 1, 6);
    }, */
  },
};
</script>
