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
    <div id="detailNews--section" class="container bg--white mt-2">
      <div class="detailNews--content">
        <a href="/noticias" id="back--button">
          <i class="fas fa-arrow-left"></i> Volver
        </a>
        <div class="image--container" :style="'background-image: url(' + news.image + ');'"></div>

        <div class="p-4">
          <div class="title--container">
            <span class="span--title">{{ news.title }}</span>
          </div>

          <div class="author--post--container">
            <div class="text--content">
              <div class="author--container">
                <span class="span--author">
                  {{
                  news.author
                  }}
                </span>
              </div>

              <div class="posted--container">
                <span class="span--posted">
                  {{
                  news.posted_on
                  }}
                </span>
              </div>
            </div>

            <div class="pic--content">
              <div class="authorpic--container">
                <img :src="news.author_image" alt />
              </div>
            </div>
          </div>

          <div class="content--container">
            <p>{{ news.content }}</p>
          </div>

          <div class="icons--container">
            <span class="span--like">
              <i class="far fa-thumbs-up"></i>
              a {{ news.likes }} personas les gusta esto.
            </span>
            <span class="span--comment">
              <i class="far fa-comment-dots"></i>
              0 comentarios.
            </span>

            <ul class="instafeed d-flex flex-wrap">
              <li>
                <a href>
                  <img
                    src="http://127.0.0.1:8000/img/footer/social-network/facebook.svg"
                    alt="Facebook"
                  />
                </a>
              </li>
              <li>
                <a href>
                  <img
                    src="http://127.0.0.1:8000/img/footer/social-network/instagram.svg"
                    alt="Instagram"
                  />
                </a>
              </li>
              <li>
                <a href>
                  <img
                    src="http://127.0.0.1:8000/img/footer/social-network/youtube.svg"
                    alt="Youtube"
                  />
                </a>
              </li>
              <li>
                <a href>
                  <img
                    src="http://127.0.0.1:8000/img/footer/social-network/linkedin.svg"
                    alt="Linkedin"
                  />
                </a>
              </li>
              <li>
                <a href>
                  <img
                    src="http://127.0.0.1:8000/img/footer/social-network/whatsapp.svg"
                    alt="Whatsapp"
                  />
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <hr />
      <div class="support-container">
        <newsletter-form></newsletter-form>
        <register-form></register-form>
      </div>
    </div>
  </div>
</template>
<script>
import LoadingComponent from "vue-loading-overlay";
import Banner from "../Reusable/Banner";
import NewsletterForm from "../Global/Newsletter";
import RegisterForm from "../Global/Register";

export default {
  components: {
    LoadingComponent,
    Banner,
    NewsletterForm,
    RegisterForm,
  },
  props: {
    idNews: {
      type: String,
    },
    urlApi: {
      type: String,
    },
  },
  data() {
    return {
      isLoading: true,
      fullPage: true,
      news: [],
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
      const api = this.urlApi + "/" + this.idNews;

      try {
        let response = await axios.get(api);

        this.news = response.data;
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
