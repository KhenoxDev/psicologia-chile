<template>
  <div class="card-feature mb-5 mb-lg-0">
    <div class="feature-icon shadow">
      <i :class="icon"></i>
    </div>
    <h3>{{ title.toUpperCase() }}</h3>
    <p v-html="description"></p>
  </div>
</template>
<script>
export default {
  props: {
    icon: {
      type: String,
      default: "",
    },
    title: {
      type: String,
      default: "",
    },
    description: {
      type: String,
      default: "",
    },
  },
};
</script>
