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
    <div class="bg--section bg--news-banner">
      <banner
        banner-identification="mainNews--banner"
        banner-title-bkg="../../../img/global/burbuja_1.svg"
        banner-title="Nuestros tips!"
      ></banner>
    </div>
    <div class="bg--white">
      <div class="container">
        <div class="list-news--header">
          <select v-model="sortKey" class="form-control">
            <option value="desc" selected>Más recientes</option>
            <option value="asc">Más antiguos</option>
          </select>
        </div>
        <hr />
        <paginate class="paginated--list" name="newsList" :list="orderedList" :per="6">
          <div class="list-news--container">
            <news
              v-for="n in paginated('newsList')"
              :key="n.id"
              :identificator="n.id"
              :image="n.image"
              :title="n.title"
              :v-html:content="n.content"
              :autor="n.author"
              :publish="n.posted_on"
              :likes="n.likes"
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
    urlAuthor: {
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
      authors: [],
      sortKey: "desc",
      paginate: ["newsList"],
    };
  },
  mounted() {
    this.onLoad();
    this.getAuthors();
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

        for (let i = 0; i < this.news.length; i++) {
          for (let j = 0; j < this.authors.length; j++) {
            if (this.news[i].author_id == this.authors[j].id) {
              this.news[i].author = this.authors[j].name;
            }
          }
        }
      } catch (error) {
        console.log(error);
      }
    },
    async getAuthors() {
      const api = this.urlAuthor;

      try {
        let response = await axios.get(api);
        for (let index = 0; index < response.data.length; index++) {
          this.authors.push(response.data[index]);
        }
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
