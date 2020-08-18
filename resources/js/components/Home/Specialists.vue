<template>
  <div id="mainSpecialist" class="container mt-4">
    <span class="title--section">
      <strong>Espe</strong>cialidades
    </span>
    <hr class="line--separator" />
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12 cards--container">
        <a
          v-for="item in col1"
          :key="item.id"
          :class="'card--specialist ' + item.class"
          :style="'background-image: linear-gradient(to left, white 30%, transparent 80%), url(' + item.image + ');'"
          :href="'profesionales/spec/' + item.title"
          target="_blank"
        >
          <div class="specialist">
            <span>{{ item.title }}</span>
          </div>
        </a>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 cards--container">
        <div
          v-for="item in col2"
          :key="item.id"
          :class="'card--specialist ' + item.class"
          :style="'background-image: linear-gradient(to left, white 30%, transparent 80%), url(' + item.image + ');'"
        >
          <div class="specialist">
            <span class="title--psicologia">{{ item.title }}</span>
            <a
              class="btn btn--specialist"
              href="profesionales"
              target="_blank"
            >Encuentra tu especialista</a>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 cards--container">
        <a
          v-for="item in col3"
          :key="item.id"
          :class="'card--specialist ' + item.class"
          :style="'background-image: linear-gradient(to left, white 30%, transparent 80%), url(' + item.image + ');'"
          :href="'profesionales/spec/' + item.title"
          target="_blank"
        >
          <div class="specialist">
            <span>{{ item.title }}</span>
          </div>
        </a>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      col1: [
        {
          title: "Adicciones",
          image: "img/specialists/adicciones.jpg",
          class: "",
        },
        {
          title: "Bullying",
          image: "img/specialists/bullying.jpg",
          class: "",
        },
        {
          title: "Estrés",
          image: "img/specialists/estres.jpg",
          class: "",
        },
      ],
      col2: [
        {
          title: "Psicología Online",
          image: "img/specialists/psicologia.jpg",
          class: "card--specialist-max",
        },
      ],
      col3: [
        {
          title: "Ruptura Emocional",
          image: "img/specialists/ruptura.jpg",
          class: "",
        },
        {
          title: "Depresión",
          image: "img/specialists/depresion.jpg",
          class: "",
        },
        {
          title: "Terapia de Parejas",
          image: "img/specialists/parejas.jpg",
          class: "",
        },
      ],
    };
  },
};
</script>
