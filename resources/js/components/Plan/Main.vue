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
		<div class="bg--section bg--professional-banner">
			<banner
				banner-identification="mainPlan--banner"
				banner-title="Planes"
			></banner>
		</div>

		<div id="detailPlan--section" class="container bg--white">
			<span class="planSection--title">Planes y valores</span>
			<hr />
			<div class="card--container">
				<div
					v-for="pln in plans"
					:key="pln.id"
					class="card--container--son"
				>
					<card
						v-for="pln2 in pln.precios"
						:key="pln2.id"
						color-back="#f4b034"
					>
						<template v-slot:frontContent>
							<div
								id="front"
								@click="getProfessionalsByPlans(pln.id)"
							>
								<div class="card-header">{{ pln2.plan }}</div>
								<div class="card-content center">
									<p v-html="pln.descripcion"></p>
								</div>
								<div class="card-footer">Cuéntame más!</div>
							</div>
						</template>
						<template v-slot:backContent>
							<div id="back">
								<div class="card-header">
									<strong>{{ pln2.sesiones }}</strong>
									sesiones a
									<strong
										>${{ formatPrice(pln2.valor) }}</strong
									>
								</div>

								<div class="card-content center">
									<!-- <a
										v-for="prof in professionals"
										:key="prof.id"
										:identificator="list.index"
										href="'profesionales/' + identificator"
										target="_blank"
										rel="noopener noreferrer"
									>
										<img :src="prof.foto" alt />
									</a> -->
								</div>
								<div class="card-footer">
									<a href="http://">Lo quiero!</a>
								</div>
							</div>
						</template>
					</card>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import LoadingComponent from "vue-loading-overlay";
import Banner from "../Reusable/Banner";
import Card from "../Reusable/Card";

export default {
	data() {
		return {
			isLoading: true,
			fullPage: true,
			plans: [],
			PlanProfessionals: []
		};
	},
	components: {
		LoadingComponent,
		Banner,
		Card
	},
	mounted() {
		this.onLoad();
		this.getPlans();
	},
	methods: {
		onLoad() {
			this.isLoading = true;
			setTimeout(() => {
				this.isLoading = false;
			}, 2000);
		},
		async getPlans() {
			this.plans = [];
			const api =
				"https://online.psicologiachile.cl/gateway-json.php?service=planes";

			try {
				let response = await axios.get(api);
				console.log(response.data);
				for (
					let index = 0;
					index < response.data.items.length;
					index++
				) {
					this.plans.push(response.data.items[index]);
				}
			} catch (error) {
				console.log(error);
			}
		},
		formatPrice: function(value) {
			let val = (value / 1).toFixed(0);
			return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		},
		async getProfessionalsByPlans(id) {
			this.PlanProfessionals = [];
			console.log("entre aqui");
			const api =
				"https://online.psicologiachile.cl/gateway-json.php?service=staff&plan=" +
				id;

			try {
				let response = await axios.get(api);
				console.log(response.data);
				for (
					let index = 0;
					index < response.data.items.length;
					index++
				) {
					this.PlanProfessionals.push(response.data.items[index]);
				}

				let newArray = this.plans.filter(plan => {
					return plan.id == id;
				});

				console.log(newArray);
			} catch (error) {
				console.log(error);
			}
		}
	}
};
</script>
