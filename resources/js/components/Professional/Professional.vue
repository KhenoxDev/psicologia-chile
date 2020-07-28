<template>
  <div id="listProfessional--section" class="container mt-4">
    <div class="listProfessional--card">
      <div>
        <img class :src="photo" alt />
      </div>

      <!-- <div>{{ titleProfessional }}</div> -->

      <!-- <div>Botón</div> -->
    </div>
    <div class="div--nameprofessional">
      <span>{{ nameProfessional }}</span>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    identificator: {
      type: String,
    },
    photo: {
      type: String,
    },
    nameProfessional: {
      type: String,
    },
    titleProfessional: {
      type: String,
    },
  },
};
</script>
