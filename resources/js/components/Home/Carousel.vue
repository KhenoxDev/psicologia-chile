<template>
  <div class="container">
    <vueper-slides infinite autoplay :slide-ratio="1 / 3" :bullets="false" :touchable="false">
      <vueper-slide v-for="(slide, i) in slides" :key="i" :image="slide.image" />
    </vueper-slides>
  </div>
</template>
<script>
import { VueperSlides, VueperSlide } from "vueperslides";

export default {
  components: { VueperSlides, VueperSlide },
  data() {
    return {
      slides: [
        {
          title: "Slide #1",
          image: "img/banner-1.jpg"
        },
        {
          title: "Slide #2",
          image: "img/banner-2.jpg"
        },
        {
          title: "Slide #3",
          image: "img/banner-3.jpg"
        },
        {
          title: "Slide #4",
          image: "img/banner-4.jpg"
        }
      ]
    };
  }
};
</script>
