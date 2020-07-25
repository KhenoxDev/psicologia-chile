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
    <div class="bg--work-banner">
      <banner></banner>
    </div>
    <div class="bg--white">
      <section-component
        v-for="image in imageSectionList"
        v-bind:key="image.id"
        v-bind:body="image.body"
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
          title: "titulo prueba 1",
          body: "cuerpa prueba 1",
          url: "img/work/section_1.svg",
        },
        {
          id: 1,
          title: "titulo prueba 2",
          body: "cuerpa prueba 2",
          url: "img/work/section_2.svg",
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
