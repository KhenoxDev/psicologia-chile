<template>
  <div id="mainWork--section" class="container mt-4">
    <div class="div--header--body">
      <div class="div--header">
        <span>{{ header }}</span>
      </div>
      <div class="div--body">
        <span v-bind:style="{height: height}">{{ body }}</span>
      </div>
    </div>
    <div class="div--image">
      <img :src="image" :alt="header" />
    </div>
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
      default: "#fff",
    },
    padding: {
      type: String,
      default: "1rem",
    },
    height: {
      type: String,
      default: "10rem",
    },
    marginTp: {
      type: String,
      default: "1rem",
    },
    marginBot: {
      type: String,
      default: "1rem",
    },
  },
};
</script>

<style lang="scss">
#mainWork--section {
  display: flex;
  justify-content: center;

  .div--header--body {
    display: flex;
    flex-direction: column;

    .div--header {
      margin-top: 1rem;
      margin-bottom: 1rem;
      font-weight: bold;
      width: 22rem;
    }

    .div--body {
      margin-top: 1rem;
      margin-bottom: 1rem;
      text-align: left;
      width: 22rem;
      color: gray;
    }
  }

  .div--image {
    margin: 1rem 9rem;
    margin-top: 1rem;
    margin-bottom: 1rem;

    img {
      width: 80%;
      height: auto;
    }
  }
}
</style>
