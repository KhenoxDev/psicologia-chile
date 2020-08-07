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
      <banner banner-identification="mainSpecialist--banner" banner-title="Especialidades"></banner>
    </div>
    <div class="d-flex flex-wrap bg--gray">
      <specialist
        v-for="specialist in specialists"
        :key="specialist.id"
        :specialist-title="specialist.nombre"
        specialist-image="img/specialists/infantil.jpg"
      ></specialist>
    </div>
  </div>
</template>

<script>
import LoadingComponent from "vue-loading-overlay";
import Banner from "../Reusable/Banner";
import Specialist from "./Specialist";

export default {
  data() {
    return {
      isLoading: true,
      fullPage: true,
      specialists: [],
    };
  },
  components: {
    LoadingComponent,
    Banner,
    Specialist,
  },
  mounted() {
    this.onLoad();
    this.getSpecialists();
  },
  methods: {
    onLoad() {
      this.isLoading = true;
      setTimeout(() => {
        this.isLoading = false;
      }, 2000);
    },
    async getSpecialists() {
      this.specialists = [];
      const api =
        "https://online.psicologiachile.cl/gateway-json.php?service=especialidades";

      try {
        let response = await axios.get(api);
        for (let index = 0; index < response.data.items.length; index++) {
          this.specialists.push(response.data.items[index]);
        }
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
