import Vue from 'vue';
import Vuex from 'vuex';

import api from '@/store/apiRoutes';
import createPersistedState from 'vuex-persistedstate'

Vue.use(Vuex);

// this is the global state
const clearedState = {
  isAuthenticated: false,
  admins: [],
  judgeSchedule: [], // array of session objects
  userId: undefined,
  operatorId: undefined,
  entitlements: [],

  // tables
  students: [],
  projects: [],
  activeJudges: [],
  pendingJudges: [],
  invitedJudges: [],
  schools: [],
  categories: [],
  scores: [],
  booths: [],
  counties: [],
  gradeLevels: [],
};

const state = {}
for (const [key, value] of Object.entries(clearedState)) {
  state[key] = value;
}

const getters = {};

const mutations = {
  RESET_DATA(state) {
    for (const [key, value] of Object.entries(clearedState)) {
      state[key] = value;
    }
  },
  UPDATE_AUTH_STATUS(state, authStatus) {
    state.isAuthenticated = authStatus;
  },
  UPDATE_ADMINS(state, admins) {
    state.admins = admins;
  },
  UPDATE_JUDGE_SCHEDULE(state, judgeSchedule) {
    state.judgeSchedule = judgeSchedule;
  },

  UPDATE_STUDENTS(state, students) {
    state.students = students;
  },

  UPDATE_PROJECTS(state, projects) {
    state.projects = projects;
  },
  UPDATE_ACTIVE_JUDGES(state, activeJudges) {
    state.activeJudges = activeJudges;
  },
  /* pending Judges */
  /* invited Judges */
  UPDATE_SCHOOLS(state, schools) {
    state.schools = schools;
  },
  UPDATE_CATEGORIES(state, categories) {
    state.categories = categories;
  },
  /* scores */
  UPDATE_BOOTHS(state, booths) {
    state.booths = booths;
  },
  UPDATE_COUNTIES(state, counties) {
    state.counties = counties;
  },
  UPDATE_GRADE_LEVELS(state, gradeLevels) {
    state.gradeLevels = gradeLevels;
  },
};

const actions = {
  async login({ commit, dispatch }, { email, password }) {
    await Vue.http.post(api.auth.login, { email, password });
    commit('UPDATE_AUTH_STATUS', true);
  },
  async logout({ commit, state }) {
    let res = await Vue.http.post(api.auth.logout);
    await commit('RESET_DATA');
    return res;
  },
  async refreshAdmins({ commit }, { limit, offset }) {
    const {
      body: { results: admins },
    } = await Vue.http.get('list/admins', {
      params: {
        limit,
        offset,
      },
    });
    commit('UPDATE_ADMINS', admins);
  },
  /* CANT FIND THE URL FOR SESSIONS */
  async refreshJudgeSchedule({ commit }) {
    const {
      body: { sessions: judgeSchedule },
    } = await Vue.http.get('read/judges/7/schedule');
    commit('UPDATE_JUDGE_SCHEDULE', judgeSchedule);
  },
  async refreshStudents({ commit }, { limit, offset }) {
    const {
      body: { results: students },
    } = await Vue.http.get('list/students', {
      params: {
        limit,
        offset,
      },
    });
    commit('UPDATE_STUDENTS', students);
  },
  async refreshProjects({ commit }, { limit, offset }) {
    const {
      body: { results: projects },
    } = await Vue.http.get('list/projects', {
      params: {
        limit,
        offset,
      },
    });
    commit('UPDATE_PROJECTS', projects);
  },
  async refreshActiveJudges({ commit }, { limit, offset }) {
    const {
      body: { results: activeJudges },
    } = await Vue.http.get('list/judges', {
      params: {
        limit,
        offset,
      },
    });
    commit('UPDATE_ACTIVE_JUDGES', activeJudges);
  },
  /* pending Judges */
  /* invited Judges */
  async refreshSchools({ commit }) {
    const {
      body: { results: schools },
    } = await Vue.http.get('list/schools', {
      params: {
        limit: -1,
      },
    });
    commit('UPDATE_SCHOOLS', schools);
  },
  async refreshCategories({ commit }, { limit, offset }) {
    const {
      body: { results: categories },
    } = await Vue.http.get('list/categories', {
      params: {
        limit,
        offset,
      },
    });
    commit('UPDATE_CATEGORIES', categories);
  },
  /* scores */
  async refreshBooths({ commit }, { limit, offset }) {
    const {
      body: { results: booths },
    } = await Vue.http.get('list/booths', {
      params: {
        limit,
        offset,
      },
    });
    commit('UPDATE_BOOTHS', booths);
  },
  async refreshCounties({ commit }) {
    const {
      body: { results: counties },
    } = await Vue.http.get('list/counties', {
      params: {
        limit: -1,
      },
    });
    commit('UPDATE_COUNTIES', counties);
  },
  async refreshGradeLevels({ commit }, { limit, offset }) {
    const {
      body: { results: gradeLevels },
    } = await Vue.http.get('list/gradeLevels', {
      params: {
        limit,
        offset,
      },
    });
    commit('UPDATE_GRADE_LEVELS', gradeLevels);
  }
};

export default new Vuex.Store({
  plugins: [createPersistedState({
    storage: window.sessionStorage
  })],
  state,
  actions,
  mutations,
  getters,
});
