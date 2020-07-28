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
      <banner banner-identification="mainAbout--banner" banner-title="¿Quiénes somos?"></banner>
    </div>
    <div class="bg--white container d-lg-flex justify-content-between">
      <feature
        v-for="feature in features"
        :key="feature.id"
        :icon="feature.icon"
        :title="feature.title"
        :description="feature.description"
      ></feature>
    </div>
  </div>
</template>

<script>
import LoadingComponent from "vue-loading-overlay";
import Banner from "../Reusable/Banner";
import Feature from "./Feature";

export default {
  data() {
    return {
      isLoading: true,
      fullPage: true,
      features: [
        {
          icon: "fas fa-crosshairs",
          title: "Misión",
          description:
            "Buscamos acercar la terapia psicológica a la vida de las personas, valiéndonos del uso de la tecnología, permitiendo que las personas accedan a una atención de calidad con una amplia red de psicólogos de distintas especialidades sin la necesidad de salir de sus hogares.",
        },
        {
          icon: "far fa-eye",
          title: "Visión",
          description:
            "Queremos posicionarnos como la plataforma más importante en sudamérica de terapia online, con la mayor cantidad de psicólogos de diversas especialidades clinicas de toda habla hispana, rompiendo las barreras de la distancia.",
        },
        {
          icon: "fas fa-hand-holding-heart",
          title: "Valores",
          description:
            "Creatividad e innovación, Profesionalismo, Seguridad, Compromiso y Vocación.",
        },
      ],
    };
  },
  components: {
    LoadingComponent,
    Banner,
    Feature,
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
