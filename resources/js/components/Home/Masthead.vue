<template>
  <header id="mainHead" :style="'background-image: url(' + imgBackground + ');'">
    <div class="container h-100">
      <div class="row h-100 w-100 m-0">
        <div class="col-lg-12 my-auto d-flex justify-content-center align-items-center">
          <div class="header-content">
            <!-- <h1 class="mb-5">
              Psicología Chile es
              <br />
              <span class="typed-text">
                <strong>{{ typeValue }}</strong>
              </span>
              <span class="cursor" :class="{'typing': typeStatus}">&nbsp;</span>
            </h1>-->
            <iframe
              class="video--presentation"
              width="560"
              height="315"
              :src="urlVid"
              frameborder="0"
              allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen
            ></iframe>
            <a href="#" class="btn btn-2 shadow-sm">¡Comienza ya!</a>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>
<script>
import { setTimeout } from "timers";
export default {
  props: {
    imgBackground: {
      type: String,
    },
    urlVid: {
      type: String,
    },
  },
  data: () => {
    return {
      typeValue: "",
      typeStatus: false,
      typeArray: ["Comodidad", "Flexibilidad", "Apoyo", "Contención"],
      typingSpeed: 150,
      erasingSpeed: 100,
      newTextDelay: 2000,
      typeArrayIndex: 0,
      charIndex: 0,
    };
  },
  methods: {
    typeText() {
      if (this.charIndex < this.typeArray[this.typeArrayIndex].length) {
        if (!this.typeStatus) this.typeStatus = true;
        this.typeValue += this.typeArray[this.typeArrayIndex].charAt(
          this.charIndex
        );
        this.charIndex += 1;
        setTimeout(this.typeText, this.typingSpeed);
      } else {
        this.typeStatus = false;
        setTimeout(this.eraseText, this.newTextDelay);
      }
    },
    eraseText() {
      if (this.charIndex > 0) {
        if (!this.typeStatus) this.typeStatus = true;
        this.typeValue = this.typeArray[this.typeArrayIndex].substring(
          0,
          this.charIndex - 1
        );
        this.charIndex -= 1;
        setTimeout(this.eraseText, this.erasingSpeed);
      } else {
        this.typeStatus = false;
        this.typeArrayIndex += 1;
        if (this.typeArrayIndex >= this.typeArray.length)
          this.typeArrayIndex = 0;
        setTimeout(this.typeText, this.typingSpeed + 1000);
      }
    },
  },
  created() {
    setTimeout(this.typeText, this.newTextDelay + 200);
  },
};
</script>
