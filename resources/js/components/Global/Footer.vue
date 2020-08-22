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
                    <a :href="nav.link">{{ nav.title }}</a>
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
            <h6 class="mb-20">Síguenos en nuestras redes</h6>
            <ul class="instafeed d-flex flex-wrap">
              <li v-for="social in socials" :key="social.id">
                <a :href="social.link">
                  <img :src="social.src" :alt="social.alt" />
                </a>
              </li>
            </ul>
          </div>
          <div class="single-footer-widget mail-chimp text-left">
            <h6 class="mb-20">Métodos de pagos</h6>
            <ul class="instafeed payments d-flex flex-wrap">
              <li v-for="pay in payments" :key="pay.id">
                <img :src="pay.src" :alt="pay.alt" />
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
      id="modalWorkUs"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modalWorkUsTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Trabaja con nosotros</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action>
              <div class="form-group">
                <input
                  type="text"
                  name="name"
                  id="name"
                  class="form-control"
                  placeholder="Nombre y apellido"
                />
              </div>
              <div class="form-group">
                <input
                  type="email"
                  name="email"
                  id="email"
                  class="form-control"
                  placeholder="Correo electrónico"
                />
              </div>
              <div class="form-group">
                <input
                  type="tel"
                  name="telefono"
                  id="telefono"
                  class="form-control"
                  placeholder="Teléfono"
                />
              </div>
              <div class="form-group">
                <input type="text" name="pais" id="pais" class="form-control" placeholder="País" />
              </div>
              <div class="form-group">
                <input
                  type="text"
                  name="ciudad"
                  id="ciudad"
                  class="form-control"
                  placeholder="Ciudad"
                />
              </div>
              <div class="form-group">
                <input type="file" name="cv" id="cv" class="form-control" />
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    <div
      class="modal fade"
      id="modalVoluntary"
      tabindex="-1"
      role="dialog"
      aria-labelledby="modalVoluntaryTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Sé voluntario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action>
              <div class="form-group">
                <input
                  type="text"
                  name="name"
                  id="name"
                  class="form-control"
                  placeholder="Nombre y apellido"
                />
              </div>
              <div class="form-group">
                <input
                  type="email"
                  name="email"
                  id="email"
                  class="form-control"
                  placeholder="Correo electrónico"
                />
              </div>
              <div class="form-group">
                <input
                  type="tel"
                  name="telefono"
                  id="telefono"
                  class="form-control"
                  placeholder="Teléfono"
                />
              </div>
              <div class="form-group">
                <select name="voluntario" id="voluntario" class="form-control">
                  <option value="1">Voluntariado 1</option>
                  <option value="2">Voluntariado 2</option>
                  <option value="3">Voluntariado 3</option>
                </select>
              </div>
              <div class="form-group">
                <textarea
                  name="mensaje"
                  id="mensaje"
                  cols="30"
                  rows="10"
                  class="form-control"
                  placeholder="Mensaje"
                ></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>
<script>
export default {
  data() {
    return {
      about:
        "Somos una plataforma de encuentro entre psicólogos y pacientes donde se desarrollan las terapias de forma vanguardista e innovadora , dando mayor facilidad de comunicación entre ambos, rompiendo las barreras del tiempo y la distancia.",
      navigation: [
        {
          title: "Inicio",
          link: "/",
        },
        {
          title: "Quiénes somos",
          link: "/quienes-somos",
        },
        {
          title: "Profesionales",
          link: "/profesionales",
        },
        {
          title: "Preguntas frecuentes",
          link: "/preguntas-frecuentes",
        },
        {
          title: "Trabaja con nosotros",
          link: "#",
        },
        {
          title: "Voluntariado",
          link: "#",
        },
        {
          title: "Contacto",
          link: "#",
        },
        {
          title: "Noticias",
          link: "/noticias",
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
          src: "img/footer/webpay.png",
        },
        // {
        //   alt: "Tranferencia",
        //   src: "img/footer/transferencia.png"
        // }
      ],
      socials: [
        {
          alt: "Facebook",
          src: "img/footer/social-network/facebook.svg",
          link: "https://www.facebook.com/PsicologiaChileOnline",
        },
        {
          alt: "Instagram",
          src: "img/footer/social-network/instagram.svg",
          link: "https://www.instagram.com/psicologiachileonline/",
        },
        {
          alt: "Youtube",
          src: "img/footer/social-network/youtube.svg",
          link: "https://www.youtube.com/channel/UCznPWn2VjzUDtm8fULeeT1w",
        },
        {
          alt: "Linkedin",
          src: "img/footer/social-network/linkedin.svg",
          link:
            "https://www.linkedin.com/company/psicologiachile/?viewAsMember=true",
        },
        {
          alt: "Whatsapp",
          src: "img/footer/social-network/whatsapp.svg",
          link: "https://api.whatsapp.com/send?phone=56995863952",
        },
      ],
    };
  },
};
</script>
