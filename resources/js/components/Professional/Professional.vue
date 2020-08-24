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
    <div class="button--container">
      <a
        class="button--plan"
        data-target="#modalProfessional"
        data-toggle="modal"
        @click="changeId(identificator)"
      >¡Conóceme!</a>
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
  methods: {
    changeId(identificator) {
      this.$store.commit("setProfessional", identificator);
    },
  },
};
</script>
