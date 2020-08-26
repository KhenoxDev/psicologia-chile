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
      <vueper-slide
        v-for="prevision in previsions"
        :key="prevision.id"
        :style="'margin-bottom:' + ['1rem']"
      >
        <template v-slot:content>
          <div class="card card-body card--prevision">
            <a :href="'profesionales/prev/' + prevision.nombre">
              <img class="img-fluid" :src="prevision.image" :alt="prevision.nombre" />
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
              prev.order = 1;
              break;
            case "Isapre Banmédica":
              prev.image = "img/prevision/Logo_Banmedica.png";
              prev.order = 3;
              break;
            case "Isapre Consalud":
              prev.image = "img/prevision/Logo_Consalud.png";
              prev.order = 2;
              break;
            case "Isapre Colmena":
              prev.image = "img/prevision/Logo_Colmena_2.jpg";
              prev.order = 6;
              break;
            case "Isapre CruzBlanca":
              prev.image = "img/prevision/Logo_Cruz_Blanca.png";
              prev.order = 8;
              break;
            case "Isapre Nueva Masvida":
              prev.image = "img/prevision/Logo_Masvida.png";
              prev.order = 7;
              break;
            case "Isapre Vida Tres":
              prev.image = "img/prevision/Logo_Vidatres.png";
              prev.order = 4;
              break;
            case "Isapre Cruz del Norte":
              prev.image = "img/prevision/Logo_Cruznorte.png";
              prev.order = 5;
              break;
            default:
              break;
          }
        });

        this.previsions.sort((a, b) => {
          if (a.order > b.order) return 1;
          if (b.order > a.order) return -1;

          return 0;
        });
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
