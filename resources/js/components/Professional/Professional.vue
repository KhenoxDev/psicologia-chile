<template>
  <div>
    <div>Foto</div>
    <div>Nombre</div>
    <div>Titulo</div>
    <div>Botón</div>
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
    name: {
      type: String,
    },
  },
};
</script>
