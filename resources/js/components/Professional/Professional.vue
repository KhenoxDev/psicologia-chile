<template>
  <div id="listProfessional--section" class="mt-4">
    <div class="listProfessional--card">
      <img :src="photo" alt />
      <!-- 		<div class="overlay">
			<div class="text">
				<i class="fab fa-instagram"></i>
				<i class="fab fa-facebook"></i>
				<br>
				<i class="fab fa-youtube"></i>
				<i class="fab fa-linkedin"></i>
			</div>
		</div> -->
    </div>
    <div class="div--nameprofessional">
      <span>{{ nameProfessional }}</span>
    </div>
    <div class="professional--star">
      <star-rating
        :rating="ratingProfessional ? ratingProfessional / 20 : 0"
        :read-only="true"
        :star-size="15"
        :round-start-rating="false"
        text-class="text-star"
      ></star-rating>
    </div>
    <div class="button--container">
      <a
        class="button--plan"
        data-target="#modalProfessional"
        data-toggle="modal"
        @click="changeId(identificator)"
        >¡Conóceme!</a
      >
    </div>
  </div>
</template>

<script type="text/javascript">
import StarRating from "vue-star-rating";

export default {
  components: {
    StarRating,
  },
  props: {
    identificator: {
      type: Number,
    },
    photo: {
      type: String,
    },
    nameProfessional: {
      type: String,
    },
    titleProfessional: {
      type: String,
    },
    ratingProfessional: {
      type: Number,
    },
  },
  methods: {
    changeId(identificator) {
      this.$store.commit("setProfessional", identificator);
    },
  },
};
</script>
<style lang="scss">
.text-star {
  padding-top: 0.3rem !important;
}
</style>
