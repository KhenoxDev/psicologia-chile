<template>
  <div id="listProfessional--section" class="mt-4">
    <div class="listProfessional--card">
      <div class="border--image">
        <img :src="photo" alt />
      </div>
    </div>

    <div class="div--nameprofessional">
      <span>{{ nameProfessional1 }}</span>
    </div>
    <div class="div--titleprofessional">
      <span>Psicólogo</span>
    </div>
    <div class="button--listprofessionals">
      <button>Ver ficha</button>
    </div>
    <!-- <div>{{ titleProfessional }}</div> -->
  </div>
</template>
<script type="text/javascript">
export default {
  props: {
    identificator: {
      type: String,
    },
    photo: {
      type: String,
    },
    nameProfessional1: {
      type: String,
    },
    titleProfessional: {
      type: String,
    },
  },
};
/* function myFunction() {
  var str = document.getElementById("hola").innerHTML;
  var res = str.replace("a", "");
  document.getElementById("hola").innerHTML = res;
} */
/* document.getElementById("demo").innerHTML = replace("a", ""); */
</script>
