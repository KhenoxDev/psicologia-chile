<template>
  <div>
    <div
      @click="isToggle=!isToggle"
      v-bind:style="{backgroundColor: colorFront, color: colorTextFront}"
      v-show="!isToggle"
      class="animated flipInX flashcard"
      :class="promotion ? 'promotion--show' : ''"
    >
      <slot name="frontContent"></slot>
    </div>
    <div
      @click="isToggle=!isToggle"
      v-bind:style="{backgroundColor: colorBack, color: colorTextBack}"
      v-show="isToggle"
      class="animated flipInX flashcard"
    >
      <slot name="backContent"></slot>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      isToggle: false
    };
  },
  props: {
    colorFront: {
      type: String,
      default: "white"
    },
    colorBack: {
      type: String,
      default: "#2ecc71"
    },
    promotion: {
      type: Boolean,
      default: false
    }
  }
};
</script>
<style lang="scss" scoped>
.center {
  text-align: center;
}

.flashcard {
  cursor: pointer;
  border-radius: 10px;
  margin: 20px;
  padding: 15px;
  box-shadow: 0 0px 10px rgba(0, 0, 0, 0.4);
  text-align: center;
}

.promotion--show {
  &::before {
    content: "";
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 30px 32px 0 0;
    border-color: #24abe2 transparent transparent transparent;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
  }

  &:hover {
    &::before {
      transition: 0.3s width ease-in-out;
      width: 9rem;
    }
  }
}

.flashcard:hover {
  box-shadow: 0 0px 15px rgba(0, 0, 0, 0.7);
}

.animated {
  animation-duration: 1s;
  animation-fill-mode: both;
}

@keyframes flipInX {
  from {
    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    animation-timing-function: ease-in;
    opacity: 0;
  }
  40% {
    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    animation-timing-function: ease-in;
  }
  60% {
    transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    opacity: 1;
  }
  80% {
    transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
  }
  to {
    transform: perspective(400px);
  }
}

.flipInX {
  backface-visibility: visible !important;
  animation-name: flipInX;
}
</style>
