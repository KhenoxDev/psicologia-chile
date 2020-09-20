import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex, axios);

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
