<template>
  <div>
    <transition>
      <loading-component
        :active.sync="isLoading"
        :is-full-page="fullPage"
        :opacity="100"
        v-bind:color="'#f4b034'"
      ></loading-component>
    </transition>
    <div class="bg--section bg--professional-banner">
      <banner
        banner-identification="mainProfessional--banner"
        banner-title="Entérate de nuestras novedades"
      ></banner>
    </div>
    <div class="bg--white">
      <div class="container">
        <div class="list-news--header">
          <select v-model="sortKey" class="form-control w-25">
            <option value="desc" selected>Más recientes</option>
            <option value="asc">Más antiguos</option>
          </select>
        </div>
        <hr />
        <paginate name="newsList" :list="orderedList" :per="5">
          <div class="list-news--container">
            <news
              v-for="n in paginated('newsList')"
              :key="n.id"
              :identificator="n.id"
              :image="n.image"
              :title="n.title"
              :content="n.content"
              :autor="n.autor"
              :publish="n.posted_on"
            ></news>
          </div>
        </paginate>
        <paginate-links class="pagination" for="newsList"></paginate-links>
      </div>
    </div>
  </div>
</template>
<script>
import News from "./News";
import LoadingComponent from "vue-loading-overlay";
import Banner from "../Reusable/Banner";
import VuePaginate from "vue-paginate";

export default {
  props: {
    urlApi: {
      type: String,
    },
  },
  components: {
    News,
    LoadingComponent,
    Banner,
    VuePaginate,
  },
  data() {
    return {
      isLoading: true,
      fullPage: true,
      news: [],
      sortKey: "desc",
      paginate: ["newsList"],
    };
  },
  mounted() {
    this.onLoad();
    this.getNews();
  },
  computed: {
    orderedList: function () {
      return _.orderBy(this.news, "posted_on", this.sortKey);
    },
  },
  methods: {
    onLoad() {
      this.isLoading = true;
      setTimeout(() => {
        this.isLoading = false;
      }, 2000);
    },
    async getNews() {
      const api = this.urlApi;

      try {
        let response = await axios.get(api);
        for (let index = 0; index < response.data.data.length; index++) {
          this.news.push(response.data.data[index]);
        }
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
