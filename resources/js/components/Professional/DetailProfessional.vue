<template>
  <div>
    <transition>
      <loading-component
        :active.sync="isLoading"
        :is-full-page="fullPage"
        :opacity="100"
        v-bind:color="'#f4b034'"
      ></loading-component>
    </transition>
    <div class="bg--section bg--professional-banner">
      <banner
        banner-identification="mainProfessional--banner"
        :banner-title="professionals[0].nombre"
      ></banner>
    </div>
    <!-- Acá va tu código de diseño recorrer professionals-->
  </div>
</template>
<script>
import LoadingComponent from "vue-loading-overlay";
import Banner from "../Reusable/Banner";

export default {
  props: {
    codeProfessional: {
      type: String,
      default: "",
    },
  },
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
    async getProfessionals() {
      this.professionals = [];
      this.onLoad();
      const api =
        "https://online.psicologiachile.cl/gateway-json.php?service=staff";

      try {
        let response = await axios.get(api);

        let aux = response.data.items.filter((professional) => {
          return professional.index == this.codeProfessional;
        });

        for (let index = 0; index < aux.length; index++) {
          this.professionals.push(aux[index]);
        }
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
