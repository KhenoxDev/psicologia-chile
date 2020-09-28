<template>
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
          Trabaja con nosotros
        </h5>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form
        method="POST"
        action="/trabaja-con-nosotros"
        enctype="multipart/form-data"
      >
        <div class="modal-body">
          <input type="hidden" name="_token" :value="csrf" />
          <div class="form-group">
            <input
              type="text"
              name="nombre"
              id="nombre"
              class="form-control"
              placeholder="Nombre y apellido"
              required
            />
          </div>
          <div class="form-group">
            <input
              type="email"
              name="correo"
              id="correo"
              class="form-control"
              placeholder="Correo electrónico"
              required
            />
          </div>
          <div class="form-group">
            <input
              type="tel"
              name="telefono"
              id="telefono"
              class="form-control"
              placeholder="Teléfono"
              required
            />
          </div>
          <div class="form-group">
            <input
              type="text"
              name="pais"
              id="pais"
              class="form-control"
              placeholder="País"
              required
            />
          </div>
          <div class="form-group">
            <input
              type="text"
              name="ciudad"
              id="ciudad"
              class="form-control"
              placeholder="Ciudad"
            />
          </div>
          <div class="form-group">
            <input
              type="file"
              name="cv"
              id="cv"
              class="form-control"
              required
            />
            <small>Sólo se admiten pdf o doc</small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cerrar
          </button>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },
};
</script>
