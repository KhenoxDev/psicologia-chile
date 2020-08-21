<template>
  <div id="listProfessional--section" class="mt-4" :style=" 'width: ' + widthProp">
    <div class="listProfessional--card">
      <div class="border--image">
        <img :src="photo" alt />
      </div>
    </div>

    <div class="div--nameprofessional">
      <span :style="'font-size: ' + titleProp">{{ nameProfessional }}</span>
    </div>
    <div class="button--container">
      <!--  <a
        class="button--detail"
        :style=" 'font-size: ' + buttonProp"
        :href="'profesionales/' + identificator"
      >Ver ficha</a>-->

      <a
        class="button--plan"
        :style=" 'font-size: ' + buttonProp"
        data-target="#modalProfessional"
        data-toggle="modal"
        @click="getProfessional(identificator)"
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
    widthProp: {
      type: String,
    },
    buttonProp: {
      type: String,
    },
    titleProp: {
      type: String,
    },
  },
  methods: {
    getProfessional(identificator) {
      this.$parent.getProfessional(identificator);
    },
  },
};
</script>
