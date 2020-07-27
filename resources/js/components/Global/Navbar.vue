<template>
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <a class="navbar-brand logo_h" href="/">
            <img src="img/navbar/logo.png" alt />
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
              <li v-for="link in links" :key="link.id" class="nav-item">
                <a class="nav-link" :href="link.href">{{ link.text }}</a>
              </li>
            </ul>

            <ul class="nav-right text-center">
              <li>
                <a href="#">Ingresa aquí</a>
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
	// props: {
	// 	links: {
	// 		type: Array,
	// 		default: ''
	// 	}
	// },
  data() {
    return {
      active: false,
      links: [
        {
          href: "/quienes-somos",
          text: "Quiénes somos",
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
