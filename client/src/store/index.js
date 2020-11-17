import Vue from 'vue';
import Vuex from 'vuex';

import api from '@/store/apiRoutes';
import createPersistedState from 'vuex-persistedstate';

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

const state = {};
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
    state.judgeSchedule = judgeSchedule.map((s) => ({ ...s, dialog: false }));
  },

  UPDATE_STUDENTS(state, students) {
    state.students = students;
  },

  UPDATE_PROJECTS(state, projects) {
    state.projects = projects;
  },
  UPDATE_JUDGES(state, judges) {
    state.judges = judges;
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
  UPDATE_IDS(state, ids) {
    state.userId = ids.userId;
    state.operatorId = ids.operatorId;
  },
};

const actions = {
  async registerJudge(ctx, data) {
    return Vue.http.post(`create/judge/public`, data);
  },
  async resetPwdSubmit(ctx, { key, pwd }) {
    return Vue.http.put(`update/pwdReset`, { key, pwd });
  },
  async resetPwd(ctx, { email }) {
    return Vue.http.post(`create/pwdReset`, { email });
  },
  async saveScore(ctx, { score, id }) {
    await Vue.http.put(`update/sessions/${id}`, { score });
  },
  async login({ commit, dispatch }, { email, password }) {
    const { body: data } = await Vue.http.post(api.auth.login, {
      email,
      password,
    });
    commit('UPDATE_IDS', data);
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
    } = await Vue.http.get('list/admins');
    if (admins) {
      commit('UPDATE_ADMINS', admins);
    } else {
      throw new Error('No admins found');
    }
  },
  /* CANT FIND THE URL FOR SESSIONS */
  async refreshJudgeSchedule({ commit, state }) {
    const {
      body: { sessions: judgeSchedule },
    } = await Vue.http.get(`read/judges/${state.operatorId}/schedule`);
    commit('UPDATE_JUDGE_SCHEDULE', judgeSchedule);
  },
  async refreshStudents({ commit }) {
    const {
      body: { results: students },
    } = await Vue.http.get('list/students');
    if (students) {
      commit('UPDATE_STUDENTS', students);
    } else {
      throw new Error('No students found');
    }
  },
  async refreshProjects({ commit }) {
    const {
      body: { results: projects },
    } = await Vue.http.get('list/projects');
    if (projects) {
      commit('UPDATE_PROJECTS', projects);
    } else {
      throw new Error('No projects found');
    }
  },
  async refreshJudges({ commit }) {
    const {
      body: { results: judges },
    } = await Vue.http.get('list/judges');
    if (judges) {
      commit('UPDATE_JUDGES', judges);
    } else {
      throw new Error('No Judges found');
    }
  },
  async refreshRegisteredJudges({ commit }) {
    const {
      body: { results: judges },
    } = await Vue.http.get('list/judges', {
      params: {
        status: 'registered',
      },
    });
    if (judges) {
      commit('UPDATE_JUDGES', judges);
    } else {
      throw new Error('No Judges found');
    }
  },
  /* pending Judges */
  /* invited Judges */
  async refreshSchools({ commit }) {
    const {
      body: { results: schools },
    } = await Vue.http.get('list/schools');
    if (schools) {
      commit('UPDATE_SCHOOLS', schools);
    } else {
      throw new Error('No schools found');
    }
  },
  async refreshCategories({ commit }) {
    const {
      body: { results: categories },
    } = await Vue.http.get('list/categories');
    if (categories) {
      commit('UPDATE_CATEGORIES', categories);
    } else {
      throw new Error('No categories found');
    }
  },
  /* scores */
  async refreshBooths({ commit }) {
    const {
      body: { results: booths },
    } = await Vue.http.get('list/booths');
    if (booths) {
      commit('UPDATE_BOOTHS', booths);
    } else {
      throw new Error('No booths found');
    }
  },
  async refreshCounties({ commit }) {
    const {
      body: { results: counties },
    } = await Vue.http.get('list/counties');
    if (counties) {
      commit('UPDATE_COUNTIES', counties);
    } else {
      throw new Error('No counties found');
    }
  },
  async refreshGradeLevels({ commit }) {
    const {
      body: { results: gradeLevels },
    } = await Vue.http.get('list/gradeLevels');
    if (gradeLevels) {
      commit('UPDATE_GRADE_LEVELS', gradeLevels);
    } else {
      throw new Error('No gradeLevels found');
    }
  },
};

export default new Vuex.Store({
  plugins: [
    createPersistedState({
      storage: window.sessionStorage,
    }),
  ],
  state,
  actions,
  mutations,
  getters,
});
