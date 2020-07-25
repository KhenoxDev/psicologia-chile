<template>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <img src="img/navbar/logo.png" alt="Logo" />
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
          <li class="nav-item" v-for="link in links" :key="link.id">
            <a class="nav-link js-scroll-trigger" :href="link.href">{{ link.text }}</a>
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
  data() {
    return {
      active: false,
      links: [
        {
          href: "#",
          text: "Quienes somos",
        },
        {
          href: "/como-funciona",
          text: "Cómo funciona",
        },
        {
          href: "#",
          text: "Profesionales",
        },
        {
          href: "#",
          text: "Especialidades",
        },
        {
          href: "#",
          text: "Planes",
        },
      ],
    };
  },
  methods: {
    isActive: function () {
      if (this.active == false) {
        this.active = true;
      } else {
        this.active = false;
      }
    },
  },
};
</script>
