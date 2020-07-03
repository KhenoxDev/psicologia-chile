<template>
  <div id="mainCopyright" class="copyright container py-2 text-center text-white">
    <div class="copyright--container">
      <small>Derechos reservados © Psicología Chile {{ year }}</small>
      <div class="social">
        <a v-for="social in socials" :key="social.id" :href="social.link" target="_blank">
          <img :src="social.src" :alt="social.alt" />
        </a>
      </div>
    </div>
  </div>
</template>
<script>
import moment from "moment";

export default {
  data() {
    return {
      year: moment().format("YYYY"),
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
