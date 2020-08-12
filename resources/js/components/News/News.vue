<template>
  <div class="news--card-container" :style="'background-image: url(' + image + ');'">
    <img src="img/global/Recurso_5.svg" alt />
    <span>{{ title }}</span>
  </div>
</template>
<script>
export default {
  props: {
    image: {
      type: String,
    },
    title: {
      type: String,
      default: "Sin titulo",
    },
  },
};
</script>
