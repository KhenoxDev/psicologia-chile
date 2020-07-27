<template>
  <div class="card-feature mb-5 mb-lg-0">
    <div class="feature-icon shadow">
      <i :class="icon"></i>
    </div>
    <h3>{{ title }}</h3>
    <p>{{ description }}</p>
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
<style lang="scss">
.card-feature {
  margin-top: 2rem;
  text-align: center;

  @media (min-width: 992px) {
    max-width: 295px;
  }

  .feature-icon {
    width: 99px;
    height: 97px;
    line-height: 97px;
    margin-right: auto;
    margin-left: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #24abe1;
    border-radius: 50%;
    transition: all 0.3s ease 0s;
    margin-bottom: 18px;

    @media (min-width: 991px) {
      margin-bottom: 25px;
    }

    i,
    span {
      font-size: 38px;
      color: #fff;
    }

    &:hover {
      background: #fff;
      border: 0.1rem #24abe1 solid;

      i,
      span {
        color: #24abe1 !important;
      }
    }
  }

  h3 {
    font-size: 20px;
    margin-bottom: 10px;

    @media (min-width: 991px) {
      margin-bottom: 20px;
    }
  }

  p {
    font-weight: 300;
  }
}
</style>
