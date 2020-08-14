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
      <banner banner-identification="mainSpecialist--banner" banner-title="Especialidades"></banner>
    </div>
    <div class="container pt-4">
      <ul class="list--specialist">
        <li class="list--specialist-item" v-for="specialist in specialists" :key="specialist.id">
          <a
            :title="specialist.nombre"
            :id="specialist.codigo"
            href="/acoso-laboral"
            data-toggle="modal"
            data-target="#exampleModal"
            @click="getProfessionalsBySpecialist(specialist.codigo)"
          >{{ specialist.nombre }}</a>
        </li>
      </ul>
    </div>
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="specialistLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="specialistLabel">{{ specialistName }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            {{ specialistDescription }}
            <ul>
              <li v-for="prof in specialistProfessionals" :key="prof.id">{{ prof.nombreCompleto }}</li>
            </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LoadingComponent from "vue-loading-overlay";
import Banner from "../Reusable/Banner";

export default {
  data() {
    return {
      isLoading: true,
      fullPage: true,
      specialists: [],
      specialistProvisional: [
        {
          name: "Estrés",
          description:
            "El estrés es la reacción de su cuerpo a un desafío o demanda. En pequeños episodios el estrés puede ser positivo, como cuando le ayuda a evitar el peligro o cumplir con una fecha límite. Pero cuando el estrés dura mucho tiempo, puede dañar su salud.",
        },
      ],
      specialistName: "sdadas",
      specialistDescription: "dsadsa",
      specialistProfessionals: [],
    };
  },
  components: {
    LoadingComponent,
    Banner,
  },
  mounted() {
    this.onLoad();
    this.getSpecialists();
  },
  methods: {
    onLoad() {
      this.isLoading = true;
      setTimeout(() => {
        this.isLoading = false;
      }, 2000);
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
    async getProfessionalsBySpecialist(id) {
      this.specialistProfessionals = [];
      const api =
        "https://online.psicologiachile.cl/gateway-json.php?service=staff&especialidad=" +
        id;

      try {
        let response = await axios.get(api);

        for (let index = 0; index < response.data.items.length; index++) {
          this.specialistProfessionals.push(response.data.items[index]);
        }
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
