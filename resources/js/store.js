import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex, axios);

export default new Vuex.Store({
	state: {
		professionalId: 0,
		appUrl: ''
	},
	mutations: {
		setProfessional(state, payload) {
			return state.professionalId = payload;
		},
		setAppUrl(state, payload) {
			return state.appUrl = payload;
		}
	},
});
