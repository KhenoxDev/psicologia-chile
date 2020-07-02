<template>
  <div id="mainPlans" class="container mt-4 mb-4">
    <span class="title--section">
      <strong>Planes</strong> destacados
    </span>
    <hr class="line--separator" />
    <vueper-slides
      class="no-shadow desktop--plans"
      infinite
      arrows-outside
      :bullets="false"
      :visible-slides="3"
      :slide-ratio="1 / 6"
    >
      <vueper-slide v-for="slide in slides" :key="slide.id">
        <template v-slot:content>
          <!-- Campos tabla planes destacados -->
          <div class="card card-body card--featuredplans">
            <div class="col-md-12 price--container">
              <span class="text--promotion" v-if="slide.promocion">¡Promoción!</span>
              <span class="text--price">{{ slide.price }}</span>
              <span class="text--cantsessions">{{ slide.cantSes }}</span>
            </div>
            <div class="col-md-12 description--container">
              <span>{{ slide.description }}</span>
            </div>
          </div>
          <!-- fin campos tabla planes destacados -->
        </template>
      </vueper-slide>
    </vueper-slides>
    <vueper-slides
      class="no-shadow mobile--plans"
      infinite
      :bullets="false"
      :arrows="false"
      :visible-slides="1"
      :slide-ratio="1 / 2"
    >
      <vueper-slide v-for="slide in slides" :key="slide.id">
        <template v-slot:content>
          <!-- Campos tabla planes destacados -->
          <div class="card card-body card--featuredplans">
            <div class="col-md-12 price--container">
              <span class="text--promotion" v-if="slide.promocion">¡Promoción!</span>
              <span class="text--price">{{ slide.price }}</span>
              <span class="text--cantsessions">{{ slide.cantSes }}</span>
            </div>
            <div class="col-md-12 description--container">
              <span>{{ slide.description }}</span>
            </div>
          </div>
          <!-- fin campos tabla planes destacados -->
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
      slides: [
        {
          title: "Slide #1",
          content: "Slide content.",
          price: "$14.490 c/sesión",
          cantSes: "5 Sesiones",
          description:
            "En este plan ingresan psicologos seleccionados para dar un servicio de calidad a un precio accesible.",
          promocion: true,
          sale: "¡PROMOCIÓN!"
        },
        {
          title: "Slide #2",
          content: "Slide content.",
          price: "$12.490 c/sesión",
          cantSes: "4 Sesiones",
          description:
            "En este plan ingresan psicologos seleccionados para dar un servicio de calidad a un precio accesible.",
          promocion: false,
          sale: "Promoción!"
        },
        {
          title: "Slide #3",
          content: "Slide content.",
          price: "$17.490 c/sesión",
          cantSes: "3 Sesiones",
          description:
            "En este plan ingresan psicologos seleccionados para dar un servicio de calidad a un precio accesible.",
          promocion: false,
          sale: "Promoción!"
        },
        {
          title: "Slide #4",
          content: "Slide content.",
          price: "$00.000 c/sesión",
          cantSes: "0 Sesiones",
          description:
            "En este plan ingresan psicologos seleccionados para dar un servicio de calidad a un precio accesible.",
          promocion: true,
          sale: "¡PROXIMAMENTE!"
        },
        {
          title: "Slide #5",
          content: "Slide content.",
          price: "$00.000 c/sesión",
          cantSes: "0 Sesiones",
          description:
            "En este plan ingresan psicologos seleccionados para dar un servicio de calidad a un precio accesible.",
          promocion: true,
          sale: "¡PROXIMAMENTE!"
        }
      ]
    };
  }
};
</script>
