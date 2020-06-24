<template>
  <nav class="navbar navbar-expand-lg bg-white text-uppercase" id="mainNav">
    <div class="container-fluid">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <img class="logo" :src="logo" :alt="logo_txt" />
      </a>
      <button
        class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold btn-orange text-white rounded"
        type="button"
        data-toggle="collapse"
        data-target="#navbarResponsive"
        aria-controls="navbarResponsive"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a
              class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
              href="#portfolio"
            >¿Quienes somos?</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a
              class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
              href="#portfolio"
            >¿Cómo funciona?</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a
              class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
              href="#portfolio"
            >Profesionales</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a
              class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
              href="#portfolio"
            >Especialidades</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Planes</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a
              class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
              href="#portfolio"
            >Previsión</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1 login--container">
            <a href class>Registrate</a>
            <a href class>Iniciar sesión</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>
<script>
export default {
  props: ["logo", "logo_txt"]
};
</script>

