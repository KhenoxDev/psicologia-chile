import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
	state: {
		professionalId: 0,
	},
	mutations: {
		setProfessional(state, payload) {
			return state.professionalId = payload;
		}
	},
});
