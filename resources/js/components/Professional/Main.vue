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
    <div class="bg--white">
      <div class="section--professional">
        <div class="d-flex flex-row flex-wrap header--professional">
          <div class="d-flex mr-auto mb-2">
            <button class="btn btn-warning">Selecciona tus preferencias</button>
          </div>
          <div class="d-flex flex-row justify-content-between align-items-center">
            <span class="mr-3">Busca a tu profesional</span>
            <autocomplete
              :items="items"
              v-model="item"
              :get-label="getLabel"
              :component-item="template"
              @update-items="updateItems"
            ></autocomplete>
          </div>
        </div>
        <hr />
      </div>
    </div>
  </div>
</template>

<script>
import LoadingComponent from "vue-loading-overlay";
import Autocomplete from "v-autocomplete";
import Banner from "../Reusable/Banner";
import Professional from "./Professional";

export default {
  data() {
    return {
      isLoading: true,
      fullPage: true,
      professionals: [],
      professional: {},
    };
  },
  components: {
    LoadingComponent,
    Autocomplete,
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
          console.log(this.professionals);
        })
        .catch((e) => {
          console.log(e);
        });
    },
    getLabel(item) {
      return item.nombreCompleto;
    },
    updateItems(text) {
      yourGetItemsMethod(text).then((response) => {
        this.items = response;
      });
    },
  },
};
</script>
