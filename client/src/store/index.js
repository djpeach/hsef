import Vue from 'vue'
import Vuex from 'vuex'

import api from "@/store/apiRoutes";

Vue.use(Vuex)

// this is the global state
const state = {
  isAuthenticated: true,
  admins: [],
  judgeSchedule: [], // array of session objects
  userId: undefined,
  operatorId: undefined,
  entitlements: [],

  // tables
  students: [],
  project: [],
  activeJudges: [],
  pendingJudges: [],
  invitedJudges: [],
  schools: [],
  categories: [],
  scores: [],
  booths: [],
  counties: [],
  gradeLevels: []
};

const getters = {

};

const mutations = {
  UPDATE_AUTH_STATUS(state, authStatus) {
    state.isAuthenticated = authStatus;
  },
  UPDATE_STUDENTS(state, students) {
    state.students = students;
  }
};

const actions = {
  async login({commit, dispatch}, { email, password }) {
    const authRes = await Vue.http.post(api.auth.login, { email, password});
    commit('UPDATE_AUTH_STATUS', true);
  },
  async refreshStudents({ commit }, { limit, offset }) {
    const { body: { results: students }} = await Vue.http.get('list/students', {
      params: {
        limit, offset
      }
    });
    commit('UPDATE_STUDENTS', students);
  }
};

export default new Vuex.Store({
  state, actions, mutations, getters
})
