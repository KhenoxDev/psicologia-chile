<template>
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Trabaja con nosotros</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action>
          <div class="form-group">
            <input
              type="text"
              name="name"
              id="name"
              class="form-control"
              placeholder="Nombre y apellido"
            />
          </div>
          <div class="form-group">
            <input
              type="email"
              name="email"
              id="email"
              class="form-control"
              placeholder="Correo electrónico"
            />
          </div>
          <div class="form-group">
            <input
              type="tel"
              name="telefono"
              id="telefono"
              class="form-control"
              placeholder="Teléfono"
            />
          </div>
          <div class="form-group">
            <input type="text" name="pais" id="pais" class="form-control" placeholder="País" />
          </div>
          <div class="form-group">
            <input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="Ciudad" />
          </div>
          <div class="form-group">
            <input type="file" name="cv" id="cv" class="form-control" />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</template>
