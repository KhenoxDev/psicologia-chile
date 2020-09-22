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
      <banner banner-identification="mainProfessional--banner" banner-title="Profesional"></banner>
    </div>
    <!-- Acá va tu código de diseño recorrer professionals-->
    <div id="detailProfessional--section" class="container bg--white">
      <div class="detailProfessional--content">
        <div class="detailImage">
          <img :src="this.professionals.foto" alt />
          <div class="div--textImage">
            <span class="span--fullname">{{ this.professionals.nombreCompleto }}</span>
            <span class="span--profesion" v-html="this.professionals.profesion"></span>
          </div>
          <div class="schedule--container">
            <span class="schedule--title">Días de atención:</span>
            <span class="span--schedule badge badge--schedule">{{ this.professionals.diasAtencion }}</span>
          </div>
        </div>

        <div class="detailText">
          <span class="span--codigo">
            <strong>Código:</strong>
            {{ this.professionals.codigo }}
          </span>
          <div class="description--container">
            <p class="p--descripcion" v-html="this.professionals.descripcion"></p>
          </div>
          <div class="specialist--container">
            <span class="specialist--title">Especialidades:</span>
            <span
              class="badge badge--psicologia span--specialist"
              v-for="spec in this.professionals.especialidades"
              :key="spec.id"
            >{{ spec }}</span>
          </div>

          <div class="prevision--container">
            <span class="prevision--title">Previsiones:</span>
            <span
              class="badge badge--psicologia span--prevision"
              v-for="prev in this.professionals.prevision"
              :key="prev.id"
            >{{ prev }}</span>
          </div>
        </div>
      </div>
    </div>

    <div id="detailPlan--section" class="container bg--white">
      <span class="planSection--title">Planes y valores</span>
      <hr />
      <div class="card--container">
        <card v-for="pln in this.professionals.planes" :key="pln.id" color-back="#f4b034">
          <template v-slot:frontContent>
            <div id="front">
              <div class="card-header">{{pln.plan}}</div>
              <div class="card-content center">
                <p>{{ pln.sesiones }} sesiones.</p>
              </div>
              <div class="card-footer">Cuéntame más!</div>
            </div>
          </template>
          <template v-slot:backContent>
            <div id="back">
              <div class="card-header">
                <strong>{{ pln.sesiones}}</strong> sesiones a
                <strong>${{ formatPrice(pln.valor) }}</strong>
              </div>

              <div class="card-content center">
                <p>{{ pln.sesiones }} sesiones.</p>
              </div>
              <div class="card-footer">
                <a :href="pln.contratar" target="_blank">Lo quiero!</a>
              </div>
            </div>
          </template>
        </card>
      </div>
    </div>
  </div>
</template>
<script>
import LoadingComponent from "vue-loading-overlay";
import Banner from "../Reusable/Banner";
import Card from "../Reusable/Card";

export default {
  components: {
    LoadingComponent,
    Banner,
    Card,
  },
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
      const api =
        "https://online.psicologiachile.cl/gateway-json.php?service=staff";

      try {
        let response = await axios.get(api);

        let aux = response.data.items.filter((professional) => {
          return professional.index == this.codeProfessional;
        });

        this.professionals = aux[0];
      } catch (error) {
        console.log(error);
      }
    },
    formatPrice: function (value) {
      let val = (value / 1).toFixed(0);
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
  },
};
</script>
