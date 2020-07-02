<template>
  <div id="mainSteps" class="container mt-4">
    <div class="title--three-steps">
      <span>Tres simples pasos encontrar tu psicólogo</span>
    </div>
    <div class="row desktop--steps">
      <div class="col-md-4">
        <div class="step--container step--line">
          <img src="img/1.png" alt />
          <span>Registrate</span>
          <p>Llena Nuestro formulario para encontrar al psicólogo especializado para tí.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="step--container step--line">
          <img src="img/2.png" alt />
          <span>Agenda tu hora</span>
          <p>Atendemos de lunes a domingo, en el horario que más te acomode.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="step--container">
          <img src="img/3.png" alt />
          <span>Atiéndete</span>
          <p>Escoge libremente el lugar que prefieras para iniciar tu sesión online.</p>
        </div>
      </div>
    </div>
    <vueper-slides autoplay class="mobile--steps" fixed-height="300px">
      <vueper-slide v-for="slide in slides" :key="slide.id">
        <template v-slot:content :style="'background: unset;'">
          <div class="step--container step--line">
            <img :src="slide.img" :alt="slide.title" />
            <span>{{ slide.title }}</span>
            <p>{{ slide.content }}</p>
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
      slides: [
        {
          img: "img/1.png",
          title: "Registrate",
          content:
            "Llena Nuestro formulario para encontrar al psicólogo especializado para tí."
        },
        {
          img: "img/2.png",
          title: "Agenda tu hora",
          content:
            "Atendemos de lunes a domingo, en el horario que más te acomode."
        },
        {
          img: "img/3.png",
          title: "Atiéndete",
          content:
            "Escoge libremente el lugar que prefieras para iniciar tu sesión online."
        }
      ]
    };
  }
};
</script>
