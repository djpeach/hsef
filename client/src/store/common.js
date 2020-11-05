import Vue from 'vue';
import api from './apiRoutes';

const state = {
  isAuthenticated: false,
};

const getters = {

};

const mutations = {
  UPDATE_AUTH_STATUS(state, authStatus) {
    state.isAuthenticated = authStatus;
  },
};

const actions = {
  async login({commit, dispatch}, { email, password }) {
    // const authRes = await Vue.http.post(api.auth.login, { email, password});
    commit('UPDATE_AUTH_STATUS', true);
  }
};

export default {
  namespaced: true,
  state, getters, mutations, actions,
};