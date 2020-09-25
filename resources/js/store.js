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
		mainSocials: [],
		mainLogo: [],
		mainPayments: [],
		mainBusiness: [],
	},
	mutations: {
		setProfessional(state, payload) {
			return state.professionalId = payload;
		},
		setAppUrl(state, payload) {
			state.appUrl = payload;
			return localStorage.setItem("appurl", state.appUrl);
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
		setMainLogo(state, payload) {
			return state.mainLogo = payload;
		},
		setMainSocials(state, payload) {
			return state.mainSocials = payload;
		},
		setMainPayments(state, payload) {
			return state.mainPayments = payload;
		},
		setMainBusiness(state, payload) {
			return state.mainBusiness = payload;
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
		loadMainLogo: function ({
			state,
			commit
		}) {
			let url = state.appUrl + '/api/logos';
			axios.get(url)
				.then(response => {
					commit('setMainLogo', response.data)
				}).catch((e) => {
					console.log(e);
				});
		},
		loadSocials: function ({
			state,
			commit
		}) {
			let url = state.appUrl + '/api/socials';
			axios.get(url)
				.then((response) => {
					commit('setMainSocials', response.data)
				}).catch((e) => {
					console.log(e);
				});
		},
		loadPayments: function ({
			state,
			commit
		}) {
			let url = state.appUrl + '/api/payments';
			axios.get(url)
				.then((response) => {
					commit('setMainPayments', response.data)
				}).catch((e) => {
					console.log(e);
				});
		},
		loadBusiness: function ({
			state,
			commit
		}) {
			let url = state.appUrl + '/api/generalities/business';
			axios.get(url)
				.then((response) => {
					commit('setMainBusiness', response.data)
				}).catch((e) => {
					console.log(e);
				});
		},
	},
	getters: {
		getAppUrl: (state, getters) => {
			return localStorage.getItem('appurl')
		}
	}
});
