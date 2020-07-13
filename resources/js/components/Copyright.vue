<template>
  <div id="mainCopyright" class="copyright container py-2 text-center text-white">
    <div class="copyright--container">
      <small>Derechos reservados © Psicología Chile {{ year }}</small>
    </div>
  </div>
</template>
<script>
import moment from "moment";

export default {
  data() {
    return {
      year: moment().format("YYYY")
    };
  }
};
</script>
