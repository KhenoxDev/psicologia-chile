<template>
  <div :id="BannerIdentification" class="container mt-4">
    <div class="banner--container">
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
  },
};
</script>
