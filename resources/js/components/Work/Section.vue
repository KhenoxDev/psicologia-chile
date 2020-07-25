<template>
  <div id="mainWork--section" class="container mt-4">
    <span>{{ body }}</span>
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
  },
};
</script>
