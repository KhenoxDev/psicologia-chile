<template>
  <nav class="navbar navbar-expand-lg bg-white text-uppercase container" id="mainNav">
    <div class="container-fluid">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <img class="logo" :src="logo" :alt="logo_txt" />
      </a>
      <button
        class="hamburger hamburger--collapse"
        :class="{'is-active': active}"
        type="button"
        data-toggle="collapse"
        data-target="#navbarResponsive"
        aria-controls="navbarResponsive"
        aria-expanded="false"
        aria-label="Toggle navigation"
        @click="isActive"
      >
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a
              class="nav-link py-3 px-0 px-lg-2 rounded js-scroll-trigger"
              href="#portfolio"
            >¿Quienes somos?</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a
              class="nav-link py-3 px-0 px-lg-2 rounded js-scroll-trigger"
              href="#portfolio"
            >¿Cómo funciona?</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a
              class="nav-link py-3 px-0 px-lg-2 rounded js-scroll-trigger"
              href="#portfolio"
            >Profesionales</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a
              class="nav-link py-3 px-0 px-lg-2 rounded js-scroll-trigger"
              href="#portfolio"
            >Especialidades</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-2 rounded js-scroll-trigger" href="#portfolio">Planes</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a
              class="nav-link py-3 px-0 px-lg-2 rounded js-scroll-trigger"
              href="#portfolio"
            >Previsión</a>
          </li>
          <div class="vertical"></div>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="login--link" href="#" target="_blank" rel="noopener noreferrer">
              <img src="img/navbar/usuario.svg" alt />
              <span>
                Ingresa
                <strong>aquí</strong>
              </span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>
<script>
export default {
  props: ["logo", "logo_txt"],
  data() {
    return {
      active: false
    };
  },
  methods: {
    isActive: function() {
      if (this.active == false) {
        this.active = true;
      } else {
        this.active = false;
      }
    }
  }
};
</script>

