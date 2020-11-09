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
    <div class="bg--section bg--plan-banner">
      <banner
        banner-identification="mainPlan--banner"
        banner-title-bkg="../../../img/global/burbuja_1.svg"
        banner-title="Planes"
      ></banner>
    </div>

    <div id="detailPlan--section" class="container bg--white">
      <span class="planSection--title">Planes y valores</span>
      <hr />
      <div class="card--container">
        <div v-for="pln in plans" :key="pln.id" class="card--container--son">
          <card v-for="pln2 in pln.precios" :key="pln2.id" color-back="#f4b034">
            <template v-slot:frontContent>
              <div id="front">
                <div class="card-header">
                  <strong>{{ pln2.sesiones }}</strong>
                  {{ pln2.sesiones > 1 ? "sesiones" : "sesión" }} a
                  <strong
                    >${{ formatPrice(pln2.valor) }}
                    {{ pln2.sesiones > 1 ? "C/U" : "" }}</strong
                  >
                </div>

                <div class="card-content center">
                  <p v-html="pln.descripcion"></p>
                </div>
                <div class="card-footer">
                  <a :href="pln2.contratar" target="_blank">Lo quiero!</a>
                </div>
              </div>
            </template>
            <template v-slot:backContent>
              <div id="back">
                <div class="card-header">{{ pln2.plan }}</div>

                <div class="card-content center">
                  <a
                    v-for="prof in pln.professionals"
                    :key="prof.index"
                    :href="'profesionales/' + prof.index"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    <img :src="prof.foto" :alt="prof.nombreCompleto" />
                  </a>
                </div>
                <div class="card-footer">
                  <a :href="pln2.contratar" target="_blank">Lo quiero!</a>
                </div>
              </div>
            </template>
          </card>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LoadingComponent from "vue-loading-overlay";
import Banner from "../Reusable/Banner";
import Card from "../Reusable/Card";

export default {
  data() {
    return {
      isLoading: true,
      fullPage: true,
      plans: [],
      planSelected: "",
    };
  },
  components: {
    LoadingComponent,
    Banner,
    Card,
  },
  mounted() {
    this.onLoad();
    this.getPlans();
  },
  methods: {
    onLoad() {
      this.isLoading = true;
      setTimeout(() => {
        this.isLoading = false;
      }, 2000);
    },
    async getPlans() {
      this.plans = [];
      const api =
        "https://online.psicologiachile.cl/gateway-json.php?service=planes";

      try {
        let response = await axios.get(api);
        for (let index = 0; index < response.data.items.length; index++) {
          this.plans.push(response.data.items[index]);
        }

        for (let index = 0; index < this.plans.length; index++) {
          this.planSelected = this.plans[index].id;
          this.plans[index].professionals = this.listProfesionals;
        }
      } catch (error) {
        console.log(error);
      }
    },
    formatPrice: function (value) {
      let val = (value / 1).toFixed(0);
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
  },
  computed: {
    listProfesionals: function () {
      const api =
        "https://online.psicologiachile.cl/gateway-json.php?service=staff&plan=" +
        this.planSelected;
      let array = [];

      axios
        .get(api)
        .then((response) => {
          for (let index = 0; index < response.data.items.length; index++) {
            array.push(response.data.items[index]);
          }
        })
        .catch((e) => {
          console.log(e);
        });

      return array;
    },
  },
};
</script>
