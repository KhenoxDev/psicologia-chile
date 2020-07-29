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
            <input
              class="form-control"
              v-model="search"
              type="text"
              placeholder="Buscar ..."
              v-on:keyup.enter="getFilterData"
            />
            <select
              class="form-control"
              v-model="sortKey"
              placeholder="Ordenar"
              v-on:change="getProfessionals"
            >
              <option value="precioASC">Precio ascendente</option>
              <option value="precioDESC">Precio descendente</option>
            </select>
          </div>
        </div>
        <div class="content--professional">
          <div
            class="d-flex flex-row flex-wrap"
            :class="filteredList.length == 0 ? 'justify-content-center' : ''"
          >
            <professional v-for="list in filteredList" :key="list.id" :photo="list.foto"></professional>
            <div v-show="filteredList.length == 0">
              <!-- TODO: Dar estilo a mensaje de No Results -->
              <span>No se encontraron resultados</span>
            </div>
          </div>
        </div>
        <hr />
      </div>
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
      search: "",
      sortKey: "precioASC",
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
    async getProfessionals() {
      this.professionals = [];
      this.onLoad();
      const api =
        "https://online.psicologiachile.cl/gateway-json.php?service=staff&filtro=" +
        this.sortKey;

      try {
        let response = await axios.get(api);
        for (let index = 0; index < response.data.items.length; index++) {
          this.professionals.push(response.data.items[index]);
        }
      } catch (error) {
        console.log(error);
      }
    },
  },
  computed: {
    filteredList() {
      return this.professionals.filter((professional) => {
        return professional.nombreCompleto
          .toLowerCase()
          .includes(this.search.toLowerCase());
      });
    },
  },
};
</script>
