<template>
  <div id="mainAbout--banner" class="container mt-4">
    <div class="banner--container">
      <span>{{ titulo }}</span>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    titulo: {
      type: String,
      default: "Quiénes Somos",
    },
  },
};
</script>
<style lang="scss">
@import "../../../sass/_variables.scss";

#mainAbout--banner {
  display: flex;

  .banner--container {
    span {
      font-size: 4rem;
      color: $white;
      font-weight: bold;
      text-shadow: 1px 1px 2px $dark;
    }
  }
}

@media only screen and (max-width: 320px) {
  #mainVoluntary {
    .voluntary--container {
      span {
        font-size: x-large;
      }
    }
  }
}

@media only screen and (min-width: 321px) and (max-width: 375px) {
  #mainVoluntary {
    .voluntary--container {
      span {
        font-size: x-large;
      }
    }
  }
}

@media only screen and (min-width: 376px) and (max-width: 425px) {
  #mainVoluntary {
    .voluntary--container {
      span {
        font-size: x-large;
      }
    }
  }
}

@media only screen and (min-width: 426px) and (max-width: 768px) {
  #mainVoluntary {
    .voluntary--container {
      span {
        font-size: x-large;
      }
    }
  }
}

@media only screen and (min-width: 769px) and (max-width: 991px) {
  #mainVoluntary {
    .voluntary--container {
      span {
        font-size: xx-large;
      }
    }
  }
}

@media only screen and (min-width: 992px) and (max-width: 1024px) {
  #mainVoluntary {
    .voluntary--container {
      span {
        font-size: xx-large;
      }
    }
  }
}

@media only screen and (min-width: 1025px) and (max-width: 1440px) {
  #mainVoluntary {
    .voluntary--container {
      span {
        font-size: xx-large;
      }
    }
  }
}

@media only screen and (min-width: 1441px) and (max-width: 1920px) {
  #mainVoluntary {
    .voluntary--container {
      span {
        font-size: xx-large;
      }
    }
  }
}

@media only screen and (min-width: 1921px) and (max-width: 2560px) {
  #mainVoluntary {
    .voluntary--container {
      span {
        font-size: xx-large;
      }
    }
  }
}
</style>
