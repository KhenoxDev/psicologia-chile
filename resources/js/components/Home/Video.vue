<template>
  <div id="mainVideo" class="container mt-4">
    <span class="title--section">¿Cómo funciona la terapia online?</span>
    <hr class="line--separator" />
    <div class="vid--container">
      <iframe
        class="vid--frame"
        width="560"
        height="315"
        :src="urlVid"
        frameborder="0"
        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen
      ></iframe>
    </div>
  </div>
</template>


<script>
export default {
  props: {
    urlVid: {
      type: String,
      default:
        "https://www.youtube.com/embed/L05eMmZqHNs?autoplay=1&mute=1&playlist=L05eMmZqHNs&loop=1",
    },
  },
};
</script>


