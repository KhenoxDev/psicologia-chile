<template>
  <div id="mainPlans" class="container mt-4 mb-4">
    <span class="title--section">
      <strong>Planes</strong> destacados
    </span>
    <hr class="line--separator" />
    <vueper-slides
      :breakpoints="breakpoints"
      class="no-shadow"
      autoplay
      infinite
      slide-multiple
      bullets-outside
      :touchable="false"
    >
      <vueper-slide v-for="pln in plansHome" :key="pln.id">
        <template v-slot:content>
          <card color-back="#f4b034">
            <template v-slot:frontContent>
              <div id="front">
                <div class="card-header">
                  <strong>{{ pln.sesiones }}</strong>
                  sesiones a
                  <strong>${{ formatPrice(pln.valor) }}</strong>
                </div>

                <div class="card-content center">
                  <p v-html="pln.descripcion"></p>
                </div>
                <div class="card-footer">
                  <a :href="pln.contratar" target="_blank">Lo quiero!</a>
                </div>
              </div>
            </template>
            <template v-slot:backContent>
              <div id="back">
                <div class="card-header">{{ pln.plan }}</div>

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
                  <a :href="pln.contratar" target="_blank">Lo quiero!</a>
                </div>
              </div>
            </template>
          </card>
        </template>
      </vueper-slide>
    </vueper-slides>
  </div>
</template>
<script>
import { VueperSlides, VueperSlide } from "vueperslides";
import Card from "../Reusable/Card";

export default {
  components: {
    VueperSlides,
    VueperSlide,
    Card,
  },
  data() {
    return {
      breakpoints: {
        321: {
          slideRatio: 1 / 2,
          visibleSlides: 1,
          arrows: false,
        },
        376: {
          slideRatio: 1 / 2,
          visibleSlides: 1,
          arrows: false,
        },
        426: {
          slideRatio: 1 / 2,
          visibleSlides: 1,
          arrows: false,
        },
        546: {
          slideRatio: 1 / 2,
          visibleSlides: 1,
          arrows: false,
        },
        769: {
          slideRatio: 1 / 4,
          visibleSlides: 2,
          arrows: false,
        },
        992: {
          slideRatio: 1 / 4,
          visibleSlides: 2,
          arrows: false,
        },
        1025: {
          slideRatio: 1 / 4,
          visibleSlides: 2,
          arrows: false,
        },
        1200: {
          slideRatio: 1 / 4,
          visibleSlides: 2,
          arrows: false,
        },
        1445: {
          slideRatio: 1 / 6,
          visibleSlides: 3,
          arrows: false,
        },
        2561: {
          slideRatio: 1 / 6,
          visibleSlides: 3,
          arrows: false,
        },
      },
      plans: [],
      plansHome: [],
      planSelected: "",
    };
  },
  mounted() {
    this.getPlans();
  },
  methods: {
    formatPrice: function (value) {
      let val = (value / 1).toFixed(0);
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
    async getPlans() {
      this.plans = [];
      const api =
        "https://online.psicologiachile.cl/gateway-json.php?service=planes";

      try {
        let response = await axios.get(api);
        for (let i = 0; i < 2; i++) {
          this.plans.push(response.data.items[i]);
        }

        for (let i = 0; i < this.plans.length; i++) {
          this.planSelected = this.plans[i].id;
          this.plans[i].professionals = this.listProfesionals;
          for (let j = 0; j < this.plans[i].precios.length; j++) {
            this.plans[i].precios[j].descripcion = this.plans[i].descripcion;
            this.plans[i].precios[j].professionals = this.plans[
              i
            ].professionals;
            this.plansHome.push(this.plans[i].precios[j]);
          }
        }
      } catch (error) {
        console.log(error);
      }
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
