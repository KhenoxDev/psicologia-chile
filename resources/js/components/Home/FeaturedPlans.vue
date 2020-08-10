<template>
  <div id="mainPlans" class="container mt-4 mb-4">
    <span class="title--section">
      <strong>Planes</strong> destacados
    </span>
    <hr class="line--separator" />
    <vueper-slides
      :breakpoints="breakpoints"
      class="no-shadow"
      :autoplay="off"
      infinite
      slide-multiple
      bullets-outside
      :touchable="false"
    >
      <vueper-slide v-for="slide in slides" :key="slide.id">
        <template v-slot:content>
          <vue-flashcard colorBack="#f4b034" :promotion="slide.promotion">
            <template v-slot:frontContent>
              <div id="front">
                <span class="promotion--span" v-show="slide.promotion">Promoción!</span>
                <div class="card-header">{{slide.title}}</div>
                <div class="card-content center">
                  <p>{{ slide.description }}</p>
                </div>
                <div class="card-footer">Cuéntame más!</div>
              </div>
            </template>
            <template v-slot:backContent>
              <div id="back">
                <div class="card-header">
                  <strong>{{ slide.sessions}}</strong> sesiones a
                  <strong>${{ formatPrice(slide.price) }}</strong>
                </div>
                <div class="card-content center">
                  <a
                    v-for="professional in slide.professionals"
                    :key="professional.id"
                    href="#"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    <img :src="professional.src" :alt="professional.alt" :title="professional.alt" />
                  </a>
                </div>
                <div class="card-footer">
                  <a href="http://">Lo quiero!</a>
                </div>
              </div>
            </template>
          </vue-flashcard>
        </template>
      </vueper-slide>
    </vueper-slides>
  </div>
</template>
<script>
import { VueperSlides, VueperSlide } from "vueperslides";
import VueFlashcard from "../Reusable/Card";

export default {
  components: {
    VueperSlides,
    VueperSlide,
    VueFlashcard,
  },
  data() {
    return {
      lists: [],
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
      slides: [
        {
          title: "Plan Contenci-ON Light",
          price: 15000,
          sessions: 5,
          promotion: false,
          description:
            "Plan pensado en una terapia de 1 a 4 meses, dependiendo de la frecuencia de las sesiones.",
          professionals: [
            {
              alt: "Alex Balada",
              src: "img/professionals/Alex_Balada_Carrasco.png",
            },
            {
              alt: "Carla Oyarce",
              src: "img/professionals/Carla_Oyarce.png",
            },
            {
              alt: "Claudia Jeldres Guajardo",
              src: "img/professionals/Claudia_Jeldres_Guajardo.png",
            },
            {
              alt: "Alex Balada",
              src: "img/professionals/Alex_Balada_Carrasco.png",
            },
            {
              alt: "Carla Oyarce",
              src: "img/professionals/Carla_Oyarce.png",
            },
            {
              alt: "Claudia Jeldres Guajardo",
              src: "img/professionals/Claudia_Jeldres_Guajardo.png",
            },
            {
              alt: "Alex Balada",
              src: "img/professionals/Alex_Balada_Carrasco.png",
            },
            {
              alt: "Carla Oyarce",
              src: "img/professionals/Carla_Oyarce.png",
            },
            {
              alt: "Claudia Jeldres Guajardo",
              src: "img/professionals/Claudia_Jeldres_Guajardo.png",
            },
          ],
        },
        {
          title: "Plan Contenci-ON Pro",
          price: 30000,
          sessions: 8,
          promotion: true,
          description:
            "Plan considerado para una terapia de 1 a 4 meses, dependiendo la frecuencia de las sesiones, con Profesionales con más de 10 años de experiencia ó desde 5 años y postítulo en su especialidad",
          professionals: [
            {
              alt: "Alex Balada",
              src: "img/professionals/Alex_Balada_Carrasco.png",
            },
            {
              alt: "Carla Oyarce",
              src: "img/professionals/Carla_Oyarce.png",
            },
            {
              alt: "Claudia Jeldres Guajardo",
              src: "img/professionals/Claudia_Jeldres_Guajardo.png",
            },
            {
              alt: "Alex Balada",
              src: "img/professionals/Alex_Balada_Carrasco.png",
            },
            {
              alt: "Carla Oyarce",
              src: "img/professionals/Carla_Oyarce.png",
            },
            {
              alt: "Claudia Jeldres Guajardo",
              src: "img/professionals/Claudia_Jeldres_Guajardo.png",
            },
            {
              alt: "Alex Balada",
              src: "img/professionals/Alex_Balada_Carrasco.png",
            },
            {
              alt: "Carla Oyarce",
              src: "img/professionals/Carla_Oyarce.png",
            },
            {
              alt: "Claudia Jeldres Guajardo",
              src: "img/professionals/Claudia_Jeldres_Guajardo.png",
            },
          ],
        },
        {
          title: "Plan Contenci-ON Pro",
          price: 30000,
          sessions: 8,
          promotion: true,
          description:
            "Plan considerado para una terapia de 1 a 4 meses, dependiendo la frecuencia de las sesiones, con Profesionales con más de 10 años de experiencia ó desde 5 años y postítulo en su especialidad",
          professionals: [
            {
              alt: "Alex Balada",
              src: "img/professionals/Alex_Balada_Carrasco.png",
            },
            {
              alt: "Carla Oyarce",
              src: "img/professionals/Carla_Oyarce.png",
            },
            {
              alt: "Claudia Jeldres Guajardo",
              src: "img/professionals/Claudia_Jeldres_Guajardo.png",
            },
            {
              alt: "Alex Balada",
              src: "img/professionals/Alex_Balada_Carrasco.png",
            },
            {
              alt: "Carla Oyarce",
              src: "img/professionals/Carla_Oyarce.png",
            },
            {
              alt: "Claudia Jeldres Guajardo",
              src: "img/professionals/Claudia_Jeldres_Guajardo.png",
            },
            {
              alt: "Alex Balada",
              src: "img/professionals/Alex_Balada_Carrasco.png",
            },
            {
              alt: "Carla Oyarce",
              src: "img/professionals/Carla_Oyarce.png",
            },
            {
              alt: "Claudia Jeldres Guajardo",
              src: "img/professionals/Claudia_Jeldres_Guajardo.png",
            },
          ],
        },
        {
          title: "Plan Contenci-ON Pro",
          price: 30000,
          sessions: 8,
          promotion: true,
          description:
            "Plan considerado para una terapia de 1 a 4 meses, dependiendo la frecuencia de las sesiones, con Profesionales con más de 10 años de experiencia ó desde 5 años y postítulo en su especialidad",
          professionals: [
            {
              alt: "Alex Balada",
              src: "img/professionals/Alex_Balada_Carrasco.png",
            },
            {
              alt: "Carla Oyarce",
              src: "img/professionals/Carla_Oyarce.png",
            },
            {
              alt: "Claudia Jeldres Guajardo",
              src: "img/professionals/Claudia_Jeldres_Guajardo.png",
            },
            {
              alt: "Alex Balada",
              src: "img/professionals/Alex_Balada_Carrasco.png",
            },
            {
              alt: "Carla Oyarce",
              src: "img/professionals/Carla_Oyarce.png",
            },
            {
              alt: "Claudia Jeldres Guajardo",
              src: "img/professionals/Claudia_Jeldres_Guajardo.png",
            },
            {
              alt: "Alex Balada",
              src: "img/professionals/Alex_Balada_Carrasco.png",
            },
            {
              alt: "Carla Oyarce",
              src: "img/professionals/Carla_Oyarce.png",
            },
            {
              alt: "Claudia Jeldres Guajardo",
              src: "img/professionals/Claudia_Jeldres_Guajardo.png",
            },
          ],
        },
        {
          title: "Plan Contenci-ON Pro",
          price: 30000,
          sessions: 8,
          promotion: true,
          description:
            "Plan considerado para una terapia de 1 a 4 meses, dependiendo la frecuencia de las sesiones, con Profesionales con más de 10 años de experiencia ó desde 5 años y postítulo en su especialidad",
          professionals: [
            {
              alt: "Alex Balada",
              src: "img/professionals/Alex_Balada_Carrasco.png",
            },
            {
              alt: "Carla Oyarce",
              src: "img/professionals/Carla_Oyarce.png",
            },
            {
              alt: "Claudia Jeldres Guajardo",
              src: "img/professionals/Claudia_Jeldres_Guajardo.png",
            },
            {
              alt: "Alex Balada",
              src: "img/professionals/Alex_Balada_Carrasco.png",
            },
            {
              alt: "Carla Oyarce",
              src: "img/professionals/Carla_Oyarce.png",
            },
            {
              alt: "Claudia Jeldres Guajardo",
              src: "img/professionals/Claudia_Jeldres_Guajardo.png",
            },
            {
              alt: "Alex Balada",
              src: "img/professionals/Alex_Balada_Carrasco.png",
            },
            {
              alt: "Carla Oyarce",
              src: "img/professionals/Carla_Oyarce.png",
            },
            {
              alt: "Claudia Jeldres Guajardo",
              src: "img/professionals/Claudia_Jeldres_Guajardo.png",
            },
          ],
        },
      ],
    };
  },
  methods: {
    formatPrice: function (value) {
      let val = (value / 1).toFixed(0);
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
    getPlans: function () {
      axios
        .get(
          "https://online.psicologiachile.cl/gateway-json.php?service=planes"
        )
        .then((response) => {
          console.log(response.data);
        })
        .catch((err) => {
          console.error(err);
        });
    },
  },
  mounted() {
    this.getPlans;
  },
};
</script>
