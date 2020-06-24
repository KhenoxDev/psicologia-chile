<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="step--container step--line">
          <img src="img/1.png" alt />
          <span>Registrate</span>
          <p>Llena Nuestro formulario para encontrar al psicólogo especializado para tí.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="step--container step--line">
          <img src="img/2.png" alt />
          <span>Agenda tu hora</span>
          <p>Atendemos de lunes a domingo, en el horario que más te acomode.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="step--container">
          <img src="img/3.png" alt />
          <span>Atiéndete</span>
          <p>Escoge libremente el lugar que prefieras para iniciar tu sesión online.</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
