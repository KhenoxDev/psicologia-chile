<template>
  <div id="mainSocial" class="float">
    <a
      v-for="social in mainSocials"
      :key="social.id"
      :href="social.link"
      :class="social.type_id == 1 ? 'facebook' : social.type_id == 2 ? 'instagram' : social.type_id == 3 ? 'twitter' : social.type_id == 4 ? 'youtube' : social.type_id == 5 ? 'whatsapp' : social.type_id == 6 ? 'linkedin' : ''"
      target="_blank"
    >
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
  </div>
</template>
<script>
import { mapState } from "vuex";
export default {
  props: {
    urlBase: {
      type: String,
    },
  },
  mounted() {
    this.$store.dispatch("loadSocials");
  },
  computed: mapState(["mainSocials"]),
};
</script>
