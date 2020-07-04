<template>
  <div id="mainNews" class="container mt-4">
    <span class="title--section">
      <strong>Psicología</strong> para ti
    </span>
    <hr class="line--separator" />
    <vueper-slides
      class="no-shadow"
      :bullets="false"
      :autoplay="false"
      :arrows="false"
      :infinite="true"
      :transitionSpeed="400"
      :visible-slides="3"
      :slide-ratio="1 / 4"
      :dragging-distance="200"
    >
      <vueper-slide v-for="(slide, i) in slides" :index="i" :key="slide.id">
        <template v-slot:content>
          <!-- Campos tabla noticias -->
          <div class="card card-body card--featurednews">
			  <div class="img--container">
            <img
              class="img-fluid border--picnews"
              :src="slide.newsPic"
              :alt="slide.newsName"
            />
			  </div>
			  <div v-if="i == 0" class="wave--container--first">
				  <span id="spanDate">{{ slide.newsDate }}</span>
				  <span id="spanText">{{ slide.newsText }} </span>
			  </div>
			  <div v-else class="wave--container--another">
				  <span id="spanDate">{{ slide.newsDate }}</span>
				  <span id="spanText">{{ slide.newsText }} </span>
			  </div>
			  <div class="seemore--news">
				<button>continuar leyendo <em class="fa fa-arrow-right"></em> </button>
			  </div>
          </div>
          <!-- fin campos tabla noticias -->
        </template>
      </vueper-slide>
    </vueper-slides>
	<div class="seeall--news">
		<button>ver todas las noticias</button>
	</div>
  </div>
</template>
<script>
import { VueperSlides, VueperSlide } from "vueperslides";

export default {
  components: { VueperSlides, VueperSlide },
  data() {
    return {
      slides: [
        {
          title: "Slide #1",
          content: "Slide content.",
		  newsPic: "img/news/news_born.jpg",
		  newsName: "news_born",
		  newsDate: "8 de abril de 2020",
		  newsText: "Lorem ipsum dolor sit amet."
        },
        {
          title: "Slide #2",
		  content: "Slide content.",
		  newsPic: "img/news/news_autoestima.jpg",
		  newsName: "news_autoestima",
		  newsDate: "9 de abril de 2020",
		  newsText: "Lorem ipsum dolor sit amet."
		},
		{
		  title: "Slide #3",
		  content: "Slide content.",
		  newsPic: "img/news/news_lenguaje.png",
		  newsName: "news_lenguaje",
		  newsDate: "10 de abril de 2020",
		  newsText: "Lorem ipsum dolor sit amet."
		},
		{
		  title: "Slide #4",
		  content: "Slide content.",
		  newsPic: "img/news/news_cerebro.jpeg",
		  newsName: "news_cerebro",
		  newsDate: "11 de abril de 2020",
		  newsText: "Lorem ipsum dolor sit amet."
		},
		{
		  title: "Slide #5",
		  content: "Slide content.",
		  newsPic: "img/news/news_piedras.png",
		  newsName: "news_piedras",
		  newsDate: "12 de abril de 2020",
		  newsText: "Lorem ipsum dolor sit amet."
		}

      ]
    };
  }
};
</script>
