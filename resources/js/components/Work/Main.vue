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
    <div class="bg--section bg--work-banner">
      <banner></banner>
    </div>
    <div class="bg--white">
      <section-component
        v-for="image in imageSectionList"
        v-bind:key="image.id"
        v-bind:header="image.title"
        v-bind:body="image.body"
        v-bind:image="image.url"
      ></section-component>
    </div>
  </div>
</template>

<script>
import LoadingComponent from "vue-loading-overlay";
import Banner from "./Banner.vue";
import SectionComponent from "./Section.vue";

export default {
  components: {
    LoadingComponent,
    Banner,
    SectionComponent,
  },
  data() {
    return {
      isLoading: true,
      fullPage: true,
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
