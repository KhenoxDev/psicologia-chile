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
    <!-- Acá va tu código de diseño -->
  </div>
</template>
<script>
import LoadingComponent from "vue-loading-overlay";

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
      professionalSelected: [],
    };
  },
  components: {
    LoadingComponent,
  },
  mounted() {
    this.onLoad();
    this.getProfessionals(this.codeProfessional);
  },
  methods: {
    onLoad() {
      this.isLoading = true;
      setTimeout(() => {
        this.isLoading = false;
      }, 2000);
    },
    async getProfessionals(code) {
      this.professionals = [];
      this.onLoad();
      const api =
        "https://online.psicologiachile.cl/gateway-json.php?service=staff";

      try {
        let response = await axios.get(api);
        for (let index = 0; index < response.data.items.length; index++) {
          this.professionals.push(response.data.items[index]);
        }

        //Generar método para buscar según el parametro .find()
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
