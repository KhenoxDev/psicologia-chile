<template>
  <footer class="footer-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>Psicología Chile</h6>
            <p>{{ about }}</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>Navegación</h6>
            <div class="row">
              <div class="col">
                <ul>
                  <li v-for="nav in navigation" :key="nav.id">
                    <a
                      v-if="nav.modal"
                      :href="nav.link"
                      data-target="#modalForm"
                      data-toggle="modal"
                      @click="toggleModal(nav.title)"
                    >{{ nav.title }}</a>
                    <a v-else :href="nav.link">{{ nav.title }}</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="single-footer-widget text-left">
            <h6>Newsletter</h6>
            <p>Suscríbete y recibe todas nuestras novedades!</p>
            <div id="mc_embed_signup">
              <form
                target="_blank"
                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                method="get"
                class="subscription relative"
              >
                <div class="input-group d-flex flex-row">
                  <input
                    name="EMAIL"
                    placeholder="Email Address"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Email Address '"
                    required
                    type="email"
                  />
                  <button class="btn bb-btn">
                    <i class="far fa-paper-plane"></i>
                  </button>
                </div>
                <div class="mt-10 info"></div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="single-footer-widget mail-chimp text-left">
            <h6 class="mb-2">Síguenos en nuestras redes</h6>
            <ul class="instafeed d-flex flex-wrap">
              <li v-for="social in mainSocials" :key="social.id">
                <a :href="social.link" target="_blank">
                  <img
                    v-if="social.type_id == 1"
                    :src="urlBase + '/img/footer/social-network/facebook.svg'"
                    alt="Facebook"
                  />
                  <img
                    v-else-if="social.type_id == 2"
                    :src="urlBase + '/img/footer/social-network/instagram.svg'"
                    alt="Instagram"
                  />
                  <img
                    v-else-if="social.type_id == 3"
                    :src="urlBase + '/img/footer/social-network/twitter.svg'"
                    alt="Twitter"
                  />
                  <img
                    v-else-if="social.type_id == 4"
                    :src="urlBase + '/img/footer/social-network/youtube.svg'"
                    alt="Youtube"
                  />
                  <img
                    v-else-if="social.type_id == 5"
                    :src="urlBase + '/img/footer/social-network/whatsapp.svg'"
                    alt="Whatsapp"
                  />
                  <img
                    v-else-if="social.type_id == 6"
                    :src="urlBase + '/img/footer/social-network/linkedin.svg'"
                    alt="Linkedin"
                  />
                </a>
              </li>
            </ul>
          </div>
          <div class="single-footer-widget mail-chimp text-left">
            <h6 class="mb-20">Métodos de pagos</h6>
            <ul class="instafeed payments d-flex flex-wrap">
              <li v-for="pay in mainPayments" :key="pay.id">
                <img :src="urlBase + pay.image" :alt="pay.name" />
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row align-items-center">
          <p class="col-lg-12 col-sm-12 footer-text m-0 text-center">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;
            2020 Todos los derechos reservados | Psicología Chile
          </p>
        </div>
      </div>
    </div>
    <div
      class="modal fade"
      id="modalForm"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modalFormTitle"
      aria-hidden="true"
    >
      <div v-if="modalSelected == 'Trabaja con nosotros'">
        <form-work-us></form-work-us>
      </div>
      <div v-else-if="modalSelected == 'Voluntariado'">
        <form-voluntary></form-voluntary>
      </div>
      <div v-else-if="modalSelected == 'Contacto'">
        <form-contact></form-contact>
      </div>
    </div>
  </footer>
</template>
<script>
import { mapState } from "vuex";
import FormWorkUs from "./Modal/FormWorkUs";
import FormVoluntary from "./Modal/FormVoluntary";
import FormContact from "./Modal/FormContact";

export default {
  components: {
    FormWorkUs,
    FormVoluntary,
    FormContact,
  },
  props: {
    urlBase: {
      type: String,
    },
  },
  mounted() {
    console.log();
  },
  data() {
    return {
      store: this.$store.state,
      modalSelected: "",
      about:
        "Somos una plataforma de encuentro entre psicólogos y pacientes donde se desarrollan las terapias de forma vanguardista e innovadora , dando mayor facilidad de comunicación entre ambos, rompiendo las barreras del tiempo y la distancia.",
      navigation: [
        {
          title: "Inicio",
          link: "/",
          modal: false,
        },
        {
          title: "Quiénes somos",
          link: "/quienes-somos",
          modal: false,
        },
        {
          title: "Profesionales",
          link: "/profesionales",
          modal: false,
        },
        {
          title: "Preguntas frecuentes",
          link: "/preguntas-frecuentes",
          modal: false,
        },
        {
          title: "Trabaja con nosotros",
          link: "#",
          modal: true,
        },
        {
          title: "Voluntariado",
          link: "#",
          modal: true,
        },
        {
          title: "Contacto",
          link: "#",
          modal: true,
        },
        {
          title: "Noticias",
          link: "/noticias",
          modal: false,
        },
        {
          title: "Políticas de privacidad",
          link: "/politica-de-privacidad-y-cookies",
          modal: false,
        },
      ],
      contacts: [
        {
          title: "Comunícate al",
          link: "+562 2979 7700",
        },
        {
          title: "Escribenos a",
          link: "contacto@psicologiachile.cl",
        },
      ],
      payments: [
        {
          alt: "Webpay",
          src: this.urlBase + "/img/footer/webpay.png",
        },
        // {
        //   alt: "Tranferencia",
        //   src: "img/footer/transferencia.png"
        // }
      ],
    };
  },
  created() {
    this.$store.dispatch("loadSocials");
    this.$store.dispatch("loadPayments");
  },
  methods: {
    toggleModal(link) {
      this.modalSelected = link;
    },
  },
  computed: mapState(["mainSocials", "mainPayments"]),
};
</script>
