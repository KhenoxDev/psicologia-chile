<template>
  <div id="mainWork--section" class="container mt-4">{{ body }}</div>
</template>


<script>
export default {
  props: ["header", "body", "image"],
};
</script>
