<template>
  <div id="mainProfessionals" class="container mt-4">
    <span class="title--section">
      <strong>Profesionales</strong> destacados
    </span>
    <hr class="line--separator" />
    <vueper-slides
      class="no-shadow"
      :breakpoints="breakpoints"
      slide-multiple
      :autoplay="off"
      :touchable="false"
      infinite
      bullets-outside
    >
      <vueper-slide v-for="list in professionals" :key="list.id" class="circulo--flotante">
        <template v-slot:content>
          <professional
            :photo="list.foto"
            :name-professional="list.nombreCompleto"
            :title-professional="list.profesion"
            :identificator="list.index"
          ></professional>
        </template>
      </vueper-slide>
    </vueper-slides>
  </div>
</template>
<script>
import { VueperSlides, VueperSlide } from "vueperslides";
import Professional from "../Professional/Professional";

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
      professionals: [],
    };
  },
  components: {
    Professional,
  },
  mounted() {
    this.getProfessionals();
  },
  methods: {
    async getProfessionals() {
      this.professionals = [];
      const api =
        "https://online.psicologiachile.cl/gateway-json.php?service=staff&orden=calificacion&tipo=destacado";

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
};
</script>
