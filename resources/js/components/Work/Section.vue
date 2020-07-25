<template>
  <div id="mainWork--section" class="container mt-4">
    <span v-bind:style="{backgroundColor: colorBody, padding: padding, height: height}">{{ body }}</span>
  </div>
</template>
<script>
export default {
  props: {
    header: {
      type: String,
      default: "",
    },
    body: {
      type: String,
      default: "",
    },
    image: {
      type: String,
      default: "",
    },
    colorBody: {
      type: String,
      default: "#323232",
    },
    padding: {
      type: String,
      default: "1rem",
    },
    height: {
      type: String,
      default: "10rem",
    },
  },
};
</script>
