<template>
  <div class="news--container" :style="'background-image: url('+ image +');'">
    <a class="news--link" :href="'noticias/' + identificator">
      <div class="news--content">
        <span class="news--title">
          <b>{{ title.substring(40,0) }}</b>
        </span>
        <ul class="news--list">
          <li>
            <span>
              by
              <b>{{ autor }}</b>
            </span>
            <span>{{ publish }}</span>
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
    link: {
      type: String,
    },
  },
};
</script>
