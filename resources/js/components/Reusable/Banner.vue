<template>
  <div :id="BannerIdentification" class="container">
    <div class="banner--container" :style="'background-image: url(' + BannerTitleBkg + ');'">
      <span>{{ BannerTitle }}</span>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    BannerTitle: {
      type: String,
      default: "",
    },
    BannerIdentification: {
      type: String,
      default: "",
    },
    BannerTitleBkg: {
      type: String,
      default: "",
    },
  },
};
</script>
