<template>
  <div id="mainSocial" class="float">
    <!-- <a
      href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202."
      class="float"
      target="_blank"
    >
      <i class="fab fa-whatsapp my-float"></i>
    </a>-->
    <a
      v-for="social in socials"
      :key="social.id"
      :href="social.link"
      :class="social.class"
      target="_blank"
    >
      <i :class="'fab ' + social.src"></i>
    </a>
  </div>
</template>
<script>
export default {
  data() {
    return {
      socials: [
        {
          alt: "Facebook",
          class: "facebook",
          src: "fa-facebook-f",
          link: "https://www.facebook.com/PsicologiaChileOnline",
        },
        {
          alt: "Instagram",
          class: "instagram",
          src: "fa-instagram",
          link: "https://www.instagram.com/psicologiachileonline/",
        },
        {
          alt: "Youtube",
          class: "youtube",
          src: "fa-youtube",
          link: "https://www.youtube.com/channel/UCznPWn2VjzUDtm8fULeeT1w",
        },
        {
          alt: "Linkedin",
          class: "linkedin",
          src: "fa-linkedin-in",
          link:
            "https://www.linkedin.com/company/psicologiachile/?viewAsMember=true",
        },
        {
          alt: "Whatsapp",
          class: "whatsapp",
          src: "fa-whatsapp",
          link: "https://api.whatsapp.com/send?phone=56995863952",
        },
      ],
    };
  },
};
</script>
