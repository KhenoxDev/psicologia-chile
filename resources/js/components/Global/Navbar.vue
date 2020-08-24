<template>
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <a class="navbar-brand logo_h" href="/">
            <img :src="imgLogo" alt="Psicología Chile" />
          </a>
          <button
            class="hamburger hamburger--collapse"
            :class="{'is-active': active}"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
            @click="isActive"
          >
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>

          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end">
              <li
                v-for="link in links"
                :key="link.id"
                class="nav-item"
                :class="current == link.name ? 'active' : ''"
              >
                <a class="nav-link" :href="link.href">{{ link.text }}</a>
              </li>
            </ul>

            <ul class="nav-right text-center">
              <li>
                <a href="https://online.psicologiachile.cl/">Ingresa aquí</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
</template>
<script>
export default {
  props: {
    current: {
      type: String,
      default: "",
    },
    imgLogo: {
      type: String,
    },
  },
  data() {
    return {
      active: false,
      links: [
        {
          name: "about",
          href: "/quienes-somos",
          text: "Nuestra empresa",
        },
        {
          name: "professional",
          href: "/profesionales",
          text: "Profesionales",
        },
        {
          name: "specialist",
          href: "/especialidades",
          text: "Especialidades",
        },
        {
          name: "plan",
          href: "/planes",
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
