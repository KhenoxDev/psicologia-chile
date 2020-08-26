<template>
  <div id="mainPrevision" class="container mt-4">
    <span class="title--section">
      <strong>Pre</strong>visión
    </span>
    <hr class="line--separator" />
    <vueper-slides
      class="no-shadow"
      :breakpoints="breakpoints"
      bullets-outside
      autoplay
      infinite
      slide-multiple
      :gap="3"
      :arrows="false"
      :transitionSpeed="100"
      :visible-slides="3"
      :slide-ratio="1 / 8"
    >
      <vueper-slide :style="'margin-bottom:' + ['1rem']">
        <template v-slot:content>
          <div class="card card-body card--prevision">
            <a :href="'profesionales/prev/' + previsions[0].nombre">
              <img class="img-fluid" :src="previsions[0].image" :alt="previsions[0].nombre" />
            </a>
          </div>
        </template>
      </vueper-slide>
      <vueper-slide :style="'margin-bottom:' + ['1rem']">
        <template v-slot:content>
          <div class="card card-body card--prevision">
            <a :href="'profesionales/prev/' + previsions[2].nombre">
              <img class="img-fluid" :src="previsions[2].image" :alt="previsions[2].nombre" />
            </a>
          </div>
        </template>
      </vueper-slide>
      <vueper-slide :style="'margin-bottom:' + ['1rem']">
        <template v-slot:content>
          <div class="card card-body card--prevision">
            <a :href="'profesionales/prev/' + previsions[1].nombre">
              <img class="img-fluid" :src="previsions[1].image" :alt="previsions[1].nombre" />
            </a>
          </div>
        </template>
      </vueper-slide>
      <vueper-slide :style="'margin-bottom:' + ['1rem']">
        <template v-slot:content>
          <div class="card card-body card--prevision">
            <a :href="'profesionales/prev/' + previsions[6].nombre">
              <img class="img-fluid" :src="previsions[6].image" :alt="previsions[6].nombre" />
            </a>
          </div>
        </template>
      </vueper-slide>
      <vueper-slide :style="'margin-bottom:' + ['1rem']">
        <template v-slot:content>
          <div class="card card-body card--prevision">
            <a :href="'profesionales/prev/' + previsions[7].nombre">
              <img class="img-fluid" :src="previsions[7].image" :alt="previsions[7].nombre" />
            </a>
          </div>
        </template>
      </vueper-slide>
      <vueper-slide :style="'margin-bottom:' + ['1rem']">
        <template v-slot:content>
          <div class="card card-body card--prevision">
            <a :href="'profesionales/prev/' + previsions[3].nombre">
              <img class="img-fluid" :src="previsions[3].image" :alt="previsions[3].nombre" />
            </a>
          </div>
        </template>
      </vueper-slide>
      <vueper-slide :style="'margin-bottom:' + ['1rem']">
        <template v-slot:content>
          <div class="card card-body card--prevision">
            <a :href="'profesionales/prev/' + previsions[5].nombre">
              <img class="img-fluid" :src="previsions[5].image" :alt="previsions[5].nombre" />
            </a>
          </div>
        </template>
      </vueper-slide>
      <vueper-slide :style="'margin-bottom:' + ['1rem']">
        <template v-slot:content>
          <div class="card card-body card--prevision">
            <a :href="'profesionales/prev/' + previsions[4].nombre">
              <img class="img-fluid" :src="previsions[4].image" :alt="previsions[4].nombre" />
            </a>
          </div>
        </template>
      </vueper-slide>
    </vueper-slides>
  </div>
</template>
<script>
import { VueperSlides, VueperSlide } from "vueperslides";

export default {
  components: { VueperSlides, VueperSlide },
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
        769: {
          slideRatio: 1 / 4,
          visibleSlides: 2,
          arrows: false,
        },
        1025: {
          slideRatio: 1 / 6,
          visibleSlides: 3,
          arrows: false,
        },
        1445: {
          slideRatio: 1 / 8,
          visibleSlides: 3,
          arrows: false,
        },
        2561: {
          slideRatio: 1 / 8,
          visibleSlides: 3,
          arrows: false,
        },
      },
      previsions: [],
    };
  },
  mounted() {
    this.getPrevisions();
  },
  methods: {
    async getPrevisions() {
      this.previsions = [];
      const api =
        "https://online.psicologiachile.cl/gateway-json.php?service=prevision";

      try {
        let response = await axios.get(api);
        for (let index = 0; index < response.data.items.length; index++) {
          this.previsions.push(response.data.items[index]);
        }

        this.previsions.some((prev) => {
          switch (prev.nombre) {
            case "Fonasa":
              prev.image = "img/prevision/Logo_Fonasa.svg";
              break;
            case "Isapre Banmédica":
              prev.image = "img/prevision/Logo_Banmedica.png";
              break;
            case "Isapre Consalud":
              prev.image = "img/prevision/Logo_Consalud.png";
              break;
            case "Isapre Colmena":
              prev.image = "img/prevision/Logo_Colmena_2.jpg";
              break;
            case "Isapre CruzBlanca":
              prev.image = "img/prevision/Logo_Cruz_Blanca.png";
              break;
            case "Isapre Nueva Masvida":
              prev.image = "img/prevision/Logo_Masvida.png";
              break;
            case "Isapre Vida Tres":
              prev.image = "img/prevision/Logo_Vidatres.png";
              break;
            case "Isapre Cruz del Norte":
              prev.image = "img/prevision/Logo_Cruznorte.png";
              break;
            default:
              break;
          }
        });
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
