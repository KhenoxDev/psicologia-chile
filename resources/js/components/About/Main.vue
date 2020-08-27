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
      <banner
        banner-identification="mainAbout--banner"
        banner-title-bkg="../../../img/global/burbuja_1.svg"
        banner-title="Nuestra Empresa"
      ></banner>
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
    <hr />
    <span class="title--about--work">
      <strong>¿Cómo funciona?</strong>
    </span>
    <hr />
    <div class="bg--white">
      <div id="mainVideo" class="container mt-4">
        <div class="vid--container">
          <iframe
            class="vid--frame"
            width="560"
            height="315"
            :src="urlVid"
            frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>
      </div>
    </div>
    <div class="bg--white">
      <!-- <section-component
        v-for="image in imageSectionList"
        v-bind:key="image.id"
        v-bind:header="image.title"
        v-bind:body="image.body"
        v-bind:image="image.url"
      ></section-component>-->
      <three-steps></three-steps>
    </div>
  </div>
</template>

<script>
import LoadingComponent from "vue-loading-overlay";
import Banner from "../Reusable/Banner";
import Feature from "./Feature";
import SectionComponent from "../Work/Section.vue";
import ThreeSteps from "../Home/ThreeSteps";

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
            "Prestar un servicio de psicología de alto nivel, presentando un abanico amplio de especialidades y profesionales, en donde podamos satisfacer las necesidades de cada consultante,  logrando una recuperación pronta y efectiva.",
        },
        {
          icon: "far fa-eye",
          title: "Visión",
          description:
            "Posicionarnos como la principal plataforma de atención psicológica Online a nivel Nacional.",
        },
        {
          icon: "fas fa-hand-holding-heart",
          title: "Valores",
          description: "Confianza, Profesionalismo y Seguridad.",
        },
      ],
      imageSectionList: [
        {
          id: 0,
          title: "Completa el formulario para crear tu cuenta.",
          body:
            "Llena nuestro formulario para encontrar al psicólogo especializado para tí.",
          url: "img/work/section_1.svg",
        },
        {
          id: 1,
          title: "Visualiza el catálogo de profesionales.",
          body:
            "Atendemos de lunes a domingo, en el horario que más te acomode.",
          url: "img/work/section_2.svg",
        },
        {
          id: 2,
          title: "Contrata a tu favorito.",
          body:
            "Escoge libremente el lugar que prefieras para iniciar tu sesión online.",
          url: "img/work/section_3.svg",
        },
      ],
    };
  },
  props: {
    urlVid: {
      type: String,
      default:
        "https://www.youtube.com/embed/L05eMmZqHNs?autoplay=1&mute=1&playlist=L05eMmZqHNs&loop=1",
    },
  },
  components: {
    LoadingComponent,
    Banner,
    Feature,
    SectionComponent,
    ThreeSteps,
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


