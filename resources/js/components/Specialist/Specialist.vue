<template>
  <div
    class="card--specialist"
    :style="'background-image: linear-gradient(to left, white 30%, transparent 80%), url(' + specialistImage + ');'"
  >
    <div class="specialist">
      <span>{{ specialistTitle }}</span>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    specialistTitle: {
      type: String,
    },
    specialistImage: {
      type: String,
    },
  },
};
</script>
<style lang="scss">
.card--specialist {
  width: 23.2rem;
  height: 6rem;
  display: flex;
  align-items: center;
  justify-content: flex-end;
  margin-bottom: 1rem;
  border-radius: 0.2rem;
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  transition: 0.25s;

  .specialist {
    text-align: right;
    font-size: 100%;
    font-weight: bold;
    color: #323232;
    padding: 0 1rem;
    border-radius: 0.5rem;
    max-width: 55%;
    width: auto;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: flex-end;
    opacity: inherit;
    flex-direction: column;
  }

  &:hover {
    animation: pulse-blue 2s infinite;

    @keyframes pulse-blue {
      0% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(52, 172, 224, 0.7);
      }

      70% {
        transform: scale(1);
        box-shadow: 0 0 0 10px rgba(52, 172, 224, 0);
      }

      100% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(52, 172, 224, 0);
      }
    }
  }
}
</style>
