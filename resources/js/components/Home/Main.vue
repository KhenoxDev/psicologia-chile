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
    <masthead :img-background="imgBackground"></masthead>
    <div class="bg--white">
      <video-component></video-component>
      <prevision></prevision>
      <were-news></were-news>
      <covenants></covenants>
    </div>
    <div class="bg--gray">
      <specialists></specialists>
    </div>
    <div class="bg--white">
      <featured-plans></featured-plans>
      <featured-professionals></featured-professionals>
    </div>
    <div class="bg--gray">
      <frequently-questions></frequently-questions>
    </div>
    <div class="bg--gray bg--divide">
      <div class="bg--div bg--workus">
        <work-us></work-us>
      </div>
      <div class="bg--div bg--voluntary">
        <voluntary></voluntary>
      </div>
      <div
        class="modal fade"
        id="modalWorkUs"
        tabindex="-1"
        role="dialog"
        aria-labelledby="modalWorkUsTitle"
        aria-hidden="true"
      >
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
                  <input
                    type="text"
                    name="ciudad"
                    id="ciudad"
                    class="form-control"
                    placeholder="Ciudad"
                  />
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
      </div>
      <div
        class="modal fade"
        id="modalVoluntary"
        tabindex="-1"
        role="dialog"
        aria-labelledby="modalVoluntaryTitle"
        aria-hidden="true"
      >
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
      </div>
    </div>
    <div class="bg--white">
      <news></news>
    </div>
  </div>
</template>

<script>
import LoadingComponent from "vue-loading-overlay";
import Masthead from "./Masthead";
import VideoComponent from "./Video";
import Prevision from "./Prevision";
import Specialists from "./Specialists";
import FeaturedPlans from "./FeaturedPlans";
import FeaturedProfessionals from "./FeaturedProfessionals";
import FrequentlyQuestions from "./FrequentlyQuestions";
import Voluntary from "./Voluntary";
import WorkUs from "./WorkUs";
import News from "./News";
import WereNews from "./WeWereNews";
import Covenants from "./Covenants";

export default {
  props: {
    imgBackground: {
      type: String,
    },
  },
  data() {
    return {
      isLoading: true,
      fullPage: true,
    };
  },
  components: {
    LoadingComponent,
    Masthead,
    VideoComponent,
    Prevision,
    Specialists,
    FeaturedPlans,
    FeaturedProfessionals,
    FrequentlyQuestions,
    Voluntary,
    News,
    WereNews,
    Covenants,
    WorkUs,
  },
  mounted() {
    this.onLoad();
  },
  methods: {
    onLoad() {
      this.isLoading = true;
      setTimeout(() => {
        this.isLoading = false;
      }, 2000);
    },
  },
};
</script>
