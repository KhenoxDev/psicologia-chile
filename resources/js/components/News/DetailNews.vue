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
    <!--  <div class="bg--section bg--professional-banner">
      <banner banner-identification="mainProfessional--banner" banner-title="Noticia"></banner>
    </div>-->
    <div id="detailNews--section" class="container bg--white mt-2">
      <div class="detailNews--content">
        <a href="/noticias" id="back--button">
          <i class="fas fa-arrow-left"></i> Volver
        </a>
        <div class="image--container"></div>

        <div class="p-4">
          <div class="title--container">
            <span class="span--title">{{ title }}</span>
          </div>

          <div class="author--post--container">
            <div class="text--content">
              <div class="author--container">
                <span class="span--author">{{ author }}</span>
              </div>

              <div class="posted--container">
                <span class="span--posted">{{ postedOn }}</span>
              </div>
            </div>

            <div class="pic--content">
              <div class="authorpic--container">
                <img :src="author_pic" alt />
              </div>
            </div>
          </div>

          <div class="content--container">
            <p>{{ content }}</p>
          </div>

          <div class="icons--container">
            <span class="span--like">
              <i class="far fa-thumbs-up"></i>
              a personas {{ countLikes }} les gusta esto.
            </span>
            <span class="span--comment">
              <i class="far fa-comment-dots"></i>
              {{ countComments }} comentarios.
            </span>

            <ul class="instafeed d-flex flex-wrap">
              <li>
                <a href>
                  <img src="img/footer/social-network/facebook.svg" alt="Facebook" />
                </a>
              </li>
              <li>
                <a href>
                  <img src="img/footer/social-network/instagram.svg" alt="Instagram" />
                </a>
              </li>
              <li>
                <a href>
                  <img src="img/footer/social-network/youtube.svg" alt="Youtube" />
                </a>
              </li>
              <li>
                <a href>
                  <img src="img/footer/social-network/linkedin.svg" alt="Linkedin" />
                </a>
              </li>
              <li>
                <a href>
                  <img src="img/footer/social-network/whatsapp.svg" alt="Whatsapp" />
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <hr />
    <div id="detailComments--section" class="container bg--white">
      <div class="detailComments--content">
        <div class="comment--title--container">
          <span class="span--comment--title">{{ countComments }} comentarios</span>
        </div>

        <div class="comment--card">
          <div class="authorpic--content">
            <div class="comment--authorpic">
              <img :src="comment_author_pic" alt />
            </div>
          </div>

          <div class="text--content--comment">
            <div class="comment--author--container">
              <span class="span--comment--author">{{ comment_author }}</span>
            </div>

            <div class="comment--date--container">
              <span class="span--comment--date">{{ comment_date }}</span>
            </div>

            <div class="comment--content">
              <span class="span--comment--content">{{ comment_content }}</span>
            </div>
          </div>
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
  components: {
    News,
    LoadingComponent,
    Banner,
  },
  props: {
    image: {
      type: String,
      default: "img/news/news_piedras.png",
    },
    title: {
      type: String,
      default: "Por un equilibrio mental en tiempos de pandemia.",
    },
    author: {
      type: String,
      default: "Psicólogo",
    },
    author_pic: {
      type: String,
      default: "img/professionals/Sofia_Fiedler_Porzio.png",
    },
    postedOn: {
      type: String,
      default: "13 de Agosto de 2020",
    },
    content: {
      type: String,
      default:
        "Llevamos casi tres meses de aislamiento, de autoconfinamiento, usando mascarillas para realizar trámites en las calles, lavándonos las manos de manera constante, sin dar abrazos ni compartir con nuestros seres queridos de forma cercana, es decir, la vida como la conocíamos ya no es la misma, ni será la misma. Este cambio ha aumentado el nivel de stress de la población mundial. Adultos, jóvenes y niños han tenido que adaptarse al teletrabajo y estudio online, transformando la distancia física en un acercamiento virtual, donde la imagen (no nosotros) lo es todo. Si bien es de suma relevancia respetar las medidas sanitarias para recuperar la salud física, también es importante concentrar los esfuerzos en la salud mental. Varios estudios avalan a las artes y, en especial, a la música como una terapia efectiva al momento de cuidar nuestras emociones, la ansiedad y niveles de frustración, que en este tiempo de aislamiento son fuertes murallas mentales. Se ha confirmado que practicar y/o escuchar música está, fuertemente relacionado con la liberación de oxitocina y dopamina, químicos que generan una sensación de bienestar en el cuerpo. También, tiene efectos en el sistema límbico y puede producir cambios fisiológicos, por lo que la musicoterapia es utilizada en la recuperación de pacientes de trauma, entre otros. Los especialistas han detectado que las reacciones que se observan en el cerebro cuando se escucha música atentamente, se asimilan a ‘fuegos artificiales’ varias zonas se iluminan. El mundo de la música conoce bien esta relación. Asimismo, los músicos han demostrado la importancia de mantenerse activos en el área, con constantes ensayos a distancia, estudiando sus instrumentos en sus casas y creando nuevas composiciones, pues consideran, de forma correcta, que su labor se asimila a la de un deportista de elite.",
    },
    countComments: {
      type: String,
      default: "1",
    },
    countLikes: {
      type: String,
      default: "17",
    },
    comment_author: {
      type: String,
      default: "Alex Balada Carrasco",
    },
    comment_content: {
      type: String,
      default: "Nice post guys!",
    },
    comment_date: {
      type: String,
      default: "14 de Agosto de 2020",
    },
    comment_author_pic: {
      type: String,
      default: "img/professionals/Alex_Balada_Carrasco.png",
    },
  },
};
</script>
