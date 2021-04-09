<template>
  <div id="mainProfessionals" class="container mt-4">
    <span class="title--section img-hover">
      <strong>Profe</strong>sionales
    </span>
    <hr class="line--separator" />
    <vueper-slides
      class="no-shadow"
      :breakpoints="breakpoints"
      slide-multiple
      autoplay
      :touchable="false"
      infinite
      bullets-outside
    >
      <vueper-slide v-for="list in professionals" :key="list.id">
        <template v-slot:content>
          <professional
            :photo="list.foto"
            :name-professional="list.nombreCompleto"
            :title-professional="list.profesion"
            :identificator="list.index"
            :rating-professional="list.calificacion"
          ></professional>
        </template>
      </vueper-slide>
    </vueper-slides>
    <div
      id="modalProfessional"
      class="modal fade"
      tabindex="-1"
      role="dialog"
      aria-labelledby="professionalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title" id="professionalLabel">
              {{ professionalSelected.nombreCompleto }}
            </h5>
            <span>Código: {{ professionalSelected.codigo }}</span>
          </div>
          <div id="modalBody" class="modal-body">
            <div class="text-center mb-2">
              <span v-html="professionalSelected.profesion"></span>
            </div>

            <div class="accordion" id="accordionExample">
              <div class="card">
                <div class="card-header" id="headingZero">
                  <h1 class="mb-0">
                    <button
                      class="btn btn-link btn-block text-left"
                      type="button"
                      data-toggle="collapse"
                      data-target="#collapseZero"
                      aria-expanded="false"
                      aria-controls="collapseZero"
                    >
                      <i class="fas fa-plus"></i>
                      <i class="fas fa-minus"></i>
                      Descripción
                    </button>
                  </h1>
                </div>
                <div
                  id="collapseZero"
                  class="collapse"
                  aria-labelledby="headingZero"
                  data-parent="#accordionExample"
                >
                  <div class="card-body">
                    <p
                      class="p--description"
                      v-html="professionalSelected.descripcion"
                    ></p>
                  </div>
                </div>

                <div class="card-header" id="headingOne">
                  <h1 class="mb-0">
                    <button
                      class="btn btn-link btn-block text-left"
                      type="button"
                      data-toggle="collapse"
                      data-target="#collapseOne"
                      aria-expanded="false"
                      aria-controls="collapseOne"
                    >
                      <i class="fas fa-plus"></i>
                      <i class="fas fa-minus"></i>
                      Especialidades
                    </button>
                  </h1>
                </div>

                <div
                  id="collapseOne"
                  class="collapse"
                  aria-labelledby="headingOne"
                  data-parent="#accordionExample"
                >
                  <div class="card-body">
                    <span
                      class="badge badge--psicologia span--specialist"
                      v-for="spec in professionalSelected.especialidades"
                      :key="spec.id"
                      >{{ spec }}</span
                    >
                  </div>
                </div>

                <div class="card-header" id="headingTwo">
                  <h1 class="mb-0">
                    <button
                      class="btn btn-link btn-block text-left"
                      type="button"
                      data-toggle="collapse"
                      data-target="#collapseTwo"
                      aria-expanded="false"
                      aria-controls="collapseTwo"
                    >
                      <i class="fas fa-plus"></i>
                      <i class="fas fa-minus"></i>
                      Previsiones
                    </button>
                  </h1>
                </div>

                <div
                  id="collapseTwo"
                  class="collapse"
                  aria-labelledby="headingTwo"
                  data-parent="#accordionExample"
                >
                  <div class="card-body">
                    <span
                      class="badge badge--psicologia span--prevision"
                      v-for="prev in professionalSelected.prevision"
                      :key="prev.id"
                      >{{ prev }}</span
                    >
                  </div>
                </div>

                <div class="card-header" id="headingThree">
                  <h1 class="mb-0">
                    <button
                      class="btn btn-link btn-block text-left"
                      type="button"
                      data-toggle="collapse"
                      data-target="#collapseThree"
                      aria-expanded="false"
                      aria-controls="collapseThree"
                    >
                      <i class="fas fa-plus"></i>
                      <i class="fas fa-minus"></i>
                      Días de atención
                    </button>
                  </h1>
                </div>
                <div
                  id="collapseThree"
                  class="collapse"
                  aria-labelledby="headingThree"
                  data-parent="#accordionExample"
                >
                  <div class="card-body">
                    <span class="span--schedule badge badge--schedule">{{
                      professionalSelected.diasAtencion
                    }}</span>
                  </div>
                </div>
              </div>
            </div>

            <div>
              <select
                name="plan"
                id="plan"
                class="form-control"
                v-model="urlProfessional"
                onfocus="this.size=5;"
                onblur="this.size=1;"
                onchange="this.size=1; this.blur();"
              >
                <option value>Seleccione plan</option>
                <option
                  v-for="prof in professionalSelected.planes"
                  :key="prof.id"
                  :value="prof.contratar"
                >
                  {{ prof.sesiones }} Sesiones por {{ formatPrice(prof.valor) }}
                </option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <a :href="urlProfessional">Contratar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { VueperSlides, VueperSlide } from "vueperslides";
import Professional from "../Professional/Professional";

export default {
  components: { VueperSlides, VueperSlide },
  data() {
    return {
      breakpoints: {
        321: {
          slideRatio: 1 / 2,
          visibleSlides: 1,
          arrows: false,
        },
        376: {
          slideRatio: 1 / 2,
          visibleSlides: 1,
          arrows: false,
        },
        426: {
          slideRatio: 1 / 4,
          visibleSlides: 2,
          arrows: false,
        },
        769: {
          slideRatio: 1 / 4,
          visibleSlides: 2,
          arrows: false,
        },
        1025: {
          slideRatio: 1 / 6,
          visibleSlides: 3,
          arrows: false,
        },
        1445: {
          slideRatio: 1 / 8,
          visibleSlides: 4,
          arrows: false,
        },
        2561: {
          slideRatio: 1 / 10,
          visibleSlides: 5,
          arrows: false,
        },
      },
      professionals: [],
      urlProfessional: "",
    };
  },
  components: {
    Professional,
  },
  mounted() {
    this.getProfessionals();
  },
  methods: {
    async getProfessionals() {
      this.professionals = [];
      const api =
        "https://online.psicologiachile.cl/gateway-json.php?service=staff&orden=calificacion&tipo=destacado";

      try {
        let response = await axios.get(api);
        for (let index = 0; index < 10; index++) {
          this.professionals.push(response.data.items[index]);
        }
      } catch (error) {
        console.log(error);
      }
    },
    formatPrice: function (value) {
      let val = (value / 1).toFixed(0);
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
  },
  computed: {
    professionalSelected: function () {
      var item = {};

      if (this.$store.state.professionalId > 0) {
        item = this.professionals.find((prof) => {
          return prof.index == this.$store.state.professionalId;
        });
      }

      return item;
    },
  },
};
</script>
