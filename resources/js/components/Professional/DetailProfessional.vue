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
        :banner-title="this.professionals[0].nombreCompleto"
      ></banner>
    </div>
    <!-- Acá va tu código de diseño recorrer professionals-->
    <div id="detailProfessional--section" class="bg--white">
      <div class="detailProfessional--content">
        <div class="detailImage">
          <img :src="this.professionals[0].foto" alt />
        </div>

        <div class="detailText">
          <span class="span--fullname">{{ this.professionals[0].nombreCompleto }}</span>
          <span class="span--profesion" v-html="this.professionals[0].profesion"></span>
          <span class="span--codigo">
            <strong>Código:</strong>
            {{ this.professionals[0].codigo }}
          </span>
          <div class="description--container">
            <p class="p--descripcion" v-html="this.professionals[0].descripcion"></p>
          </div>
          <div class="specialist--container">
            <span class="specialist--title">Especialidades:</span>
            <span
              class="badge badge--psicologia span--specialist"
              v-for="spec in this.professionals[0].especialidades"
              :key="spec.id"
            >{{ spec }}</span>
          </div>

          <div class="prevision--container">
            <span class="prevision--title">Previsiones:</span>
            <span
              class="badge badge--psicologia span--prevision"
              v-for="prev in this.professionals[0].prevision"
              :key="prev.id"
            >{{ prev }}</span>
          </div>
          <div class="schedule--container">
            <span class="schedule--title">Días de atención:</span>
            <span
              class="span--schedule badge badge--schedule"
            >{{ this.professionals[0].diasAtencion }}</span>
          </div>
        </div>
      </div>
    </div>

    <div id="detailPlan--section" class="bg--white">
      <span class="planSection--title">Planes y valores</span>
      <hr />
      <span class="span--plan" v-for="pln in this.professionals[0].plan" :key="pln.id">{{ pln }}</span>
    </div>
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
