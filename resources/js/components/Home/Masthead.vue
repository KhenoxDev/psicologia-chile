<template>
  <header
    id="mainHead"
    :style="'background-image: url(' + imgBackground + ');'"
  >
    <div class="container h-100">
      <div class="row h-100 w-100 m-0">
        <div
          class="col-lg-12 my-auto d-flex justify-content-center align-items-center"
        >
          <div class="header-content">
            <iframe
              class="video--presentation"
              width="560"
              height="315"
              :src="urlVid + '?autoplay=1&mute=1&playlist=TrREbV49fuU&loop=1'"
              frameborder="0"
              allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen
            ></iframe>
            <a href="profesionales" class="btn btn-2 shadow-sm"
              >¡Encuentra tu profesional!</a
            >
          </div>
        </div>
      </div>
    </div>
  </header>
</template>
<script>
export default {
  props: {
    imgBackground: {
      type: String,
    },
    urlVid: {
      type: String,
    },
  },
  mounted() {
    if (this.$store.state.mainBanner.length > 0) {
      this.imgBackground = this.$store.state.mainBanner[0].element;
    }

    if (this.$store.state.mainVideo.length > 0) {
      this.urlVid = this.$store.state.mainVideo[0].element;
    }
  },
};
</script>
