<template>
  <div class="vld-parent">
    <transition>
      <loading-component
        :active.sync="isLoading"
        :is-full-page="fullPage"
        :opacity="100"
        v-bind:color="'#f4b034'"
      ></loading-component>
    </transition>
    <div class="bg--section bg--professional-banner">
      <banner banner-identification="mainProfessional--banner" banner-title="Profesionales"></banner>
    </div>
    <div class="bg--white">
      <div class="section--professional container">
        <div class="header--professional">
          <div class="filter--container">
            <button class="btn btn--filter" @click="toggle">
              <i class="fas fa-filter"></i>
              Filtrar
            </button>
            <Drawer @close="toggle" align="left" :closeable="true" :maskClosable="true">
              <div class="filter--content" v-if="open">
                <div class="mb-2">
                  <a
                    data-toggle="collapse"
                    href="#collapsePrevision"
                    role="button"
                    aria-expanded="false"
                    aria-controls="collapsePrevision"
                  >Previsión</a>
                  <hr />
                  <div id="collapsePrevision" class="collapse filter--options">
                    <div class="filter--option" v-for="prevision in previsions" :key="prevision.id">
                      <input
                        type="checkbox"
                        v-model="previsionSelected"
                        :id="prevision.id"
                        :name="prevision.nombre"
                        :value="prevision.nombre"
                      />
                      <label :for="prevision.id">
                        {{
                        prevision.nombre
                        }}
                      </label>
                    </div>
                  </div>
                </div>
                <div class="mb-2 mt-3">
                  <a
                    data-toggle="collapse"
                    href="#collapseSpecialist"
                    role="button"
                    aria-expanded="false"
                    aria-controls="collapseSpecialist"
                  >Especialidades</a>
                  <hr />
                  <div id="collapseSpecialist" class="collapse filter--options">
                    <div
                      class="filter--option"
                      v-for="specialist in specialists"
                      :key="specialist.id"
                    >
                      <input
                        type="checkbox"
                        v-model="specialistSelected"
                        :id="specialist.codigo"
                        :name="specialist.nombre"
                        :value="specialist.nombre"
                      />
                      <label :for="specialist.codigo">
                        {{
                        specialist.nombre
                        }}
                      </label>
                    </div>
                  </div>
                </div>
                <!-- <div class="mb-2 mt-3">
                  <a
                    data-toggle="collapse"
                    href="#collapseSchedule"
                    role="button"
                    aria-expanded="false"
                    aria-controls="collapseSchedule"
                  >Horario de atención</a>
                  <hr />
                  <div id="collapseSchedule" class="collapse filter--options">
                    <div class="filter--option" v-for="schedule in schedules" :key="schedule.id">
                      <input
                        type="checkbox"
                        v-model="scheduleSelected"
                        :id="schedule"
                        :name="schedule"
                        :value="schedule"
                      />
                      <label :for="schedule">
                        {{
                        schedule
                        }}
                      </label>
                    </div>
                  </div>
                </div>
                <div class="mb-2 mt-3">
                  <a
                    data-toggle="collapse"
                    href="#collapseGender"
                    role="button"
                    aria-expanded="false"
                    aria-controls="collapseGender"
                  >Género</a>
                  <hr />
                  <div id="collapseGender" class="collapse filter--options">
                    <div class="filter--option" v-for="gender in genders" :key="gender.id">
                      <input
                        type="checkbox"
                        v-model="genderSelected"
                        :id="gender"
                        :name="gender"
                        :value="gender"
                      />
                      <label :for="gender">
                        {{
                        gender
                        }}
                      </label>
                    </div>
                  </div>
                </div>-->
                <div class="filter--buttons fixed-bottom">
                  <button class="btn btn--clean" @click="cleanOptions">Limpiar</button>
                </div>
              </div>
            </Drawer>
          </div>
          <div class="search--container">
            <input
              class="form-control mr-3"
              v-model="search"
              type="text"
              placeholder="Busca a tu profesional"
              v-on:keyup.enter="getFilterData"
            />
            <select
              class="form-control"
              v-model="sortKey"
              placeholder="Ordenar"
              v-on:change="getProfessionals"
            >
              <option value="precioASC">Precio ascendente</option>
              <option value="precioDESC">Precio descendente</option>
              <option value="sesionesgratis">Sesiones gratuitas</option>
            </select>
          </div>
        </div>
        <hr />
        <div class="content--professional">
          <professional
            v-for="list in filteredList"
            :key="list.id"
            :photo="list.foto"
            :name-professional="list.nombreCompleto"
            :title-professional="list.profesion"
            :identificator="list.index"
            width-prop="13rem"
            button-prop="0.5rem"
            title-prop="0.8rem"
          ></professional>
          <div class="no-results" v-show="filteredList.length == 0">
            <!-- TODO: Dar estilo a mensaje de No Results -->
            <span>No se encontraron resultados</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
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
            <h5 class="modal-title" id="professionalLabel">{{ professionalSelected.nombreCompleto }}</h5>
            <span>Código: {{ professionalSelected.codigo }}</span>
          </div>
          <div id="modalBody" class="modal-body">
            <div>
              <span v-html="professionalSelected.profesion"></span>
            </div>

            <div class="accordion" id="accordionExample">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h1 class="mb-0">
                    <button
                      class="btn btn-link btn-block text-left"
                      type="button"
                      data-toggle="collapse"
                      data-target="#collapseOne"
                      aria-expanded="true"
                      aria-controls="collapseOne"
                    >Especialidades</button>
                  </h1>
                </div>
                <div class="card-header" id="headingTwo">
                  <h1 class="mb-0">
                    <button
                      class="btn btn-link btn-block text-left"
                      type="button"
                      data-toggle="collapse"
                      data-target="#collapseOne"
                      aria-expanded="true"
                      aria-controls="collapseOne"
                    >Previsiones</button>
                  </h1>
                </div>
                <div class="card-header" id="headingThree">
                  <h1 class="mb-0">
                    <button
                      class="btn btn-link btn-block text-left"
                      type="button"
                      data-toggle="collapse"
                      data-target="#collapseOne"
                      aria-expanded="true"
                      aria-controls="collapseOne"
                    >Días atención</button>
                  </h1>
                </div>
              </div>
            </div>

            <select name id class="form-control" v-model="urlProfessional">
              <option value>Seleccione plan</option>
              <option
                v-for="prof in professionalSelected.planes"
                :key="prof.id"
                :value="prof.contratar"
              >{{ prof.sesiones }} Sesiones por {{ formatPrice(prof.valor) }}</option>
            </select>
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
import LoadingComponent from "vue-loading-overlay";
import Banner from "../Reusable/Banner";
import Professional from "./Professional";
import Drawer from "vue-simple-drawer";

export default {
  props: {
    filterOpt: {
      type: String,
    },
    nameOpt: {
      type: String,
    },
  },
  data() {
    return {
      isLoading: true,
      fullPage: true,
      professionals: [],
      previsions: [],
      specialists: [],
      schedules: [
        "Lunes",
        "Martes",
        "Miércoles",
        "Jueves",
        "Viernes",
        "Sábado",
        "Domingo",
      ],
      genders: ["Varón", "Mujer"],
      previsionSelected: [],
      specialistSelected: [],
      scheduleSelected: [],
      genderSelected: [],
      search: "",
      sortKey: "precioASC",
      open: false,
      professionalId: "",
      professionalSelected: {},
      urlProfessional: "",
    };
  },
  components: {
    LoadingComponent,
    Banner,
    Professional,
    Drawer,
  },
  mounted() {
    this.onLoad();
    this.getProfessionals();
    if (this.filterOpt.length > 0 && this.nameOpt.length > 0) {
      if (this.filterOpt == "prev") {
        this.previsionSelected.push(this.nameOpt);
      }

      if (this.filterOpt == "spec") {
        this.specialistSelected.push(this.nameOpt);
      }
    }
  },
  methods: {
    getProfessional(identificator) {
      var aux = this.professionals.find((prof) => {
        return prof.index == identificator;
      });
      this.professionalSelected = aux;
    },
    onLoad() {
      this.isLoading = true;
      setTimeout(() => {
        this.isLoading = false;
      }, 2000);
    },
    async getProfessionals() {
      this.professionals = [];
      this.onLoad();
      const api =
        "https://online.psicologiachile.cl/gateway-json.php?service=staff&filtro=" +
        this.sortKey;

      try {
        let response = await axios.get(api);
        for (let index = 0; index < response.data.items.length; index++) {
          this.professionals.push(response.data.items[index]);
        }
      } catch (error) {
        console.log(error);
      }
    },
    async getPrevisions() {
      this.previsions = [];
      const api =
        "https://online.psicologiachile.cl/gateway-json.php?service=prevision";

      try {
        let response = await axios.get(api);
        for (let index = 0; index < response.data.items.length; index++) {
          this.previsions.push(response.data.items[index]);
        }
      } catch (error) {
        console.log(error);
      }
    },
    async getSpecialists() {
      this.specialists = [];
      const api =
        "https://online.psicologiachile.cl/gateway-json.php?service=especialidades";

      try {
        let response = await axios.get(api);
        for (let index = 0; index < response.data.items.length; index++) {
          this.specialists.push(response.data.items[index]);
        }
      } catch (error) {
        console.log(error);
      }
    },
    toggle() {
      this.open = !this.open;
      this.getPrevisions();
      this.getSpecialists();
    },
    cleanOptions() {
      this.previsionSelected = [];
      this.specialistSelected = [];
      this.scheduleSelected = [];
      this.genderSelected = [];
    },
    formatPrice: function (value) {
      let val = (value / 1).toFixed(0);
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
  },
  computed: {
    filteredList() {
      // return this.professionals.filter((professional) => {
      //   return professional.nombreCompleto
      //     .toLowerCase()
      //     .includes(this.search.toLowerCase());
      // });

      if (
        this.previsionSelected.length == 0 &&
        this.specialistSelected.length == 0
      )
        return (
          this.professionals &&
          this.professionals.filter((professional) => {
            return professional.nombreCompleto
              .toLowerCase()
              .includes(this.search.toLowerCase());
          })
        );

      if (
        this.previsionSelected.length > 0 &&
        this.specialistSelected.length == 0
      ) {
        var aux = this.professionals.filter((professional) => {
          return professional.prevision.some((prevision) => {
            return (
              this.previsionSelected.includes(prevision) &&
              professional.nombreCompleto
                .toLowerCase()
                .includes(this.search.toLowerCase())
            );
          });
        });
      } else if (
        this.previsionSelected.length == 0 &&
        this.specialistSelected.length > 0
      ) {
        var aux = this.professionals.filter((professional) => {
          return professional.especialidades.some((specialist) => {
            return (
              this.specialistSelected.includes(specialist) &&
              professional.nombreCompleto
                .toLowerCase()
                .includes(this.search.toLowerCase())
            );
          });
        });
      } else {
        var aux = this.professionals.filter((professional) => {
          return (
            professional.especialidades.some((specialist) => {
              return this.specialistSelected.includes(specialist);
            }) &&
            professional.prevision.some((prevision) => {
              return this.previsionSelected.includes(prevision);
            }) &&
            professional.nombreCompleto
              .toLowerCase()
              .includes(this.search.toLowerCase())
          );
        });
      }

      return aux;
    },
  },
};
</script>
