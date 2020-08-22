<template>
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sé voluntario</h5>
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
            <select name="voluntario" id="voluntario" class="form-control">
              <option value="1">Voluntariado 1</option>
              <option value="2">Voluntariado 2</option>
              <option value="3">Voluntariado 3</option>
            </select>
          </div>
          <div class="form-group">
            <textarea
              name="mensaje"
              id="mensaje"
              cols="30"
              rows="10"
              class="form-control"
              placeholder="Mensaje"
            ></textarea>
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
