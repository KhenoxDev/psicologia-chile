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
    <div class="container pt-4">
      <ul class="list--specialist">
        <li class="list--specialist-item" v-for="specialist in specialists" :key="specialist.id">
          <a
            :title="specialist.nombre"
            :id="specialist.codigo"
            href="/acoso-laboral"
          >{{ specialist.nombre }}</a>
        </li>
      </ul>
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
      specialists: [],
    };
  },
  components: {
    LoadingComponent,
    Banner,
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
        console.log(response.data);
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