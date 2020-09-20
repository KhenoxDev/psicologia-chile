import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex, axios);

export default new Vuex.Store({
	state: {
		professionalId: 0,
		appUrl: '',
		mainVideo: [],
		mainBanner: [],
		mainPopup: [],
	},
	mutations: {
		setProfessional(state, payload) {
			return state.professionalId = payload;
		},
		setAppUrl(state, payload) {
			return state.appUrl = payload;
		},
		setMainVideo(state, payload) {
			return state.mainVideo = payload;
		},
		setMainBanner(state, payload) {
			return state.mainBanner = payload;
		},
		setMainPopup(state, payload) {
			return state.mainPopup = payload;
		},
	},
	actions: {
		loadMainVideo: function ({
			state,
			commit
		}) {
			let url = state.appUrl + '/api/generalities/video';
			axios.get(url)
				.then((response) => {
					commit('setMainVideo', response.data)
				}).catch((e) => {
					console.log(e);
				});
		},
		loadMainBanner: function ({
			state,
			commit
		}) {
			let url = state.appUrl + '/api/generalities/banner';
			axios.get(url)
				.then((response) => {
					commit('setMainBanner', response.data)
				}).catch((e) => {
					console.log(e);
				});
		},
		loadMainPopup: function ({
			state,
			commit
		}) {
			let url = state.appUrl + '/api/generalities/popup';
			axios.get(url)
				.then((response) => {
					commit('setMainPopup', response.data)
				}).catch((e) => {
					console.log(e);
				});
		},
	}
});
