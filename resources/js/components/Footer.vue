<template>
  <footer id="mainFooter" class="container mt-4">
    <div class="row">
      <!-- Footer Location-->
      <div class="col-lg-4 mb-5 mb-lg-0 navigation--container">
        <h4 class="text-uppercase mb-4">Navegación</h4>
        <a v-for="nav in navigation" :key="nav.id" :href="nav.link">{{ nav.title }}</a>
      </div>
      <!-- Footer Social Icons-->
      <div class="col-lg-4 mb-5 mb-lg-0 contact--container">
        <h4 class="text-uppercase mb-4">Contáctanos</h4>
        <div v-for="contact in contacts" :key="contact.id">
          <span>
            {{ contact.title }}
            <strong>{{ contact.link }}</strong>
          </span>
        </div>
        <br />
        <h4 class="text-uppercase mb-4">Redes sociales</h4>
        <div class="social">
          <a v-for="social in socials" :key="social.id" :href="social.link" target="_blank">
            <img :src="social.src" :alt="social.alt" />
          </a>
        </div>
      </div>
      <!-- Footer About Text-->
      <div class="col-lg-4 payment--container">
        <h4 class="text-uppercase mb-4">Medios de pagos</h4>
        <div class="payment">
          <div v-for="pay in payment" :key="pay.id" class="payment--method">
            <img :src="pay.src" :alt="pay.alt" />
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
      navigation: [
        {
          title: "Inicio",
          link: "#"
        },
        {
          title: "Quiénes somos",
          link: "#"
        },
        {
          title: "Cómo funciona",
          link: "#"
        },
        {
          title: "Profesionales",
          link: "#"
        },
        {
          title: "Preguntas frecuentes",
          link: "#"
        },
        {
          title: "Trabaja con nosotros",
          link: "#"
        },
        {
          title: "Contacto",
          link: "#"
        },
        {
          title: "Noticias",
          link: "#"
        }
      ],
      contacts: [
        {
          title: "Comunícate al",
          link: "+562 2979 7700"
        },
        {
          title: "Escribenos a",
          link: "contacto@psicologiachile.cl"
        }
      ],
      payment: [
        {
          alt: "Webpay",
          src: "img/footer/webpay.jpg"
        }
        // {
        //   alt: "Tranferencia",
        //   src: "img/footer/transferencia.png"
        // }
      ],
      socials: [
        {
          alt: "Facebook",
          src: "img/footer/social-network/facebook.svg",
          link: "https://www.facebook.com/PsicologiaChileOnline"
        },
        {
          alt: "Instagram",
          src: "img/footer/social-network/instagram.svg",
          link: "https://www.instagram.com/psicologiachileonline/"
        },
        {
          alt: "Youtube",
          src: "img/footer/social-network/youtube.svg",
          link: "https://www.youtube.com/channel/UCznPWn2VjzUDtm8fULeeT1w"
        },
        {
          alt: "Linkedin",
          src: "img/footer/social-network/linkedin.svg",
          link:
            "https://www.linkedin.com/company/psicologiachile/?viewAsMember=true"
        },
        {
          alt: "Whatsapp",
          src: "img/footer/social-network/whatsapp.svg",
          link: "https://api.whatsapp.com/send?phone=56995863952"
        }
      ]
    };
  }
};
</script>
