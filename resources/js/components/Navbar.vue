<template>
  <nav class="navbar navbar-expand-lg bg-white text-uppercase" id="mainNav">
    <div class="container-fluid">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <img class="logo" :src="logo" :alt="logo-txt" />
      </a>
      <button
        class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
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
  props: ["logo", "logo-txt"]
};
</script>
<style lang="scss">
.logo {
  min-width: 25%;
  max-width: 80%;
  width: 100%;
}

.login--container {
  display: flex;
  flex-direction: row;
  align-items: center;
  a {
    margin-left: 1rem;
    padding: 1rem;
    background-color: #f7941e;
    border-radius: 15px;
    font-size: 0.9rem;
    text-decoration: none;
    color: #fff;
  }
}
</style>

