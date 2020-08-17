<template>
  <div class="news--container" :style="'background-image: url('+ image +'); width:'+ widthProp">
    <a class="news--link" :href="'noticias/' + identificator">
      <div class="news--content">
        <span class="news--title">
          <b>{{ title.substring(40,0) }}</b>
        </span>
        <ul class="news--list">
          <li>
            by
            <span>
              <b>{{ autor }}</b>
            </span>
            {{ publish }}
          </li>
          <li>
            <i class="far fa-thumbs-up"></i>
            {{ likes }}
          </li>
          <li>
            <i class="far fa-comment-dots"></i>
            {{ comments }}
          </li>
        </ul>
      </div>
    </a>
  </div>
</template>
<script>
export default {
  props: {
    identificator: {
      type: Number,
    },
    image: {
      type: String,
    },
    title: {
      type: String,
      default: "Sin titulo",
    },
    autor: {
      type: String,
      default: "Anónimo",
    },
    publish: {
      type: String,
    },
    likes: {
      type: Number,
      default: 0,
    },
    comments: {
      type: Number,
      default: 0,
    },
    link: {
      type: String,
    },
    widthProp: {
      type: String,
    },
  },
};
</script>
