<template>
  <div id="mainAbout--banner" class="container mt-4">
    <div class="banner--container">
      <span>{{ titulo }}</span>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    titulo: {
      type: String,
      default: "Quiénes Somos",
    },
  },
};
</script>
