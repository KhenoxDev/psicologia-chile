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
      <div class="section--professional container">
        <div class="header--professional">
          <div class="filter--container">
            <button class="btn btn--filter" @click="toggle">
              <i class="fas fa-filter"></i>
              Filtrar
            </button>
            <Drawer @close="toggle" align="left" :closeable="true">
              <div v-if="open">content here</div>
            </Drawer>
          </div>
          <div class="search--container">
            <input
              class="form-control mr-3"
              v-model="search"
              type="text"
              placeholder="Busca a tu profesional"
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
        <hr />
        <div class="content--professional">
          <professional
            v-for="list in filteredList"
            :key="list.id"
            :photo="list.foto"
            :name-professional="list.nombreCompleto"
            :title-professional="list.profesion"
            :identificator="list.index"
          ></professional>
          <div class="no-results" v-show="filteredList.length == 0">
            <!-- TODO: Dar estilo a mensaje de No Results -->
            <span>No se encontraron resultados</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LoadingComponent from "vue-loading-overlay";
import Banner from "../Reusable/Banner";
import Professional from "./Professional";
import Drawer from "vue-simple-drawer";

export default {
  data() {
    return {
      isLoading: true,
      fullPage: true,
      professionals: [],
      search: "",
      sortKey: "precioASC",
      open: false,
    };
  },
  components: {
    LoadingComponent,
    Banner,
    Professional,
    Drawer,
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
    toggle() {
      this.open = !this.open;
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
