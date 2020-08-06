<template>
  <div id="listProfessional--section" class="mt-4">
    <div class="listProfessional--card">
      <div class="border--image">
        <img :src="photo" alt />
      </div>
    </div>

    <div class="div--nameprofessional">
      <span>{{ nameProfessional }}</span>
    </div>
    <div class="div--titleprofessional">
      <span>Psicólogo</span>
    </div>
    <div class="button--listprofessionals">
      <a :href="'profesionales/' + identificator">Ver ficha</a>
    </div>
    <!-- <div>{{ titleProfessional }}</div> -->
  </div>
</template>
<script type="text/javascript">
export default {
  props: {
    identificator: {
      type: Number,
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
