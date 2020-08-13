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
          <select v-model="sortKey" v-on:change="getNews" class="form-control w-25">
            <option value="desc" selected>Más recientes</option>
            <option value="asc">Más antiguos</option>
          </select>
        </div>
        <hr />
        <div class="list-news--container">
          <news
            v-for="n in news"
            :key="n.id"
            :image="n.image"
            :title="n.title"
            :content="n.content"
            :autor="n.autor"
            :publish="n.posted_on"
          ></news>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import News from "./News";
import LoadingComponent from "vue-loading-overlay";
import Banner from "../Reusable/Banner";

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
  },
  data() {
    return {
      isLoading: true,
      fullPage: true,
      news: [],
      sortKey: "desc",
    };
  },
  mounted() {
    this.onLoad();
    this.getNews();
  },
  methods: {
    onLoad() {
      this.isLoading = true;
      setTimeout(() => {
        this.isLoading = false;
      }, 2000);
    },
    async getNews() {
      this.news = [];
      this.onLoad();
      const api = this.urlApi + "/" + this.sortKey;

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
