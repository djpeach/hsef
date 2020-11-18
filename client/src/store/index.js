import Vue from 'vue';
import Vuex from 'vuex';
import _ from 'lodash';

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
  checkedIn: false,

  // tables
  students: [],
  projects: [],
  judges: [],
  pendingJudges: [],
  invitedJudges: [],
  schools: [],
  categories: [],
  scores: [],
  booths: [],
  counties: [],
  gradeLevels: [],
  categoryPreferences: [],
  categoryPreferencesGlobal: [],
  gradeLevelPreferences: [],
  gradeLevelPreferencesGlobal: [],
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
  UPDATE_PENDING_JUDGES(state, judges) {
    state.pendingJudges = judges;
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
  UPDATE_PREFERENCES(state, prefs) {
    state.categoryPreferences = prefs.categories;
    state.gradeLevelPreferences = prefs.gradeLevels;
  },
  UPDATE_GLOBAL_PREFERENCES(state, prefs) {
    state.categoryPreferencesGlobal = prefs.categories;
    state.gradeLevelPreferencesGlobal = prefs.gradeLevels;
  },
  UPDATE_GL_PREFS(state, val) {
    state.gradeLevelPreferences = val;
  },
  UPDATE_CAT_PREFS(state, val) {
    state.categoryPreferences = val;
  },
  UPDATE_CHECKEDIN(state, val) {
    state.checkedIn = val;
  }
};

const actions = {
  // create
  async registerJudge(ctx, data) {
    return Vue.http.post(`create/judges/public`, data);
  },
  async resetPwd(ctx, { email }) {
    return Vue.http.post(`create/pwdReset`, { email });
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
  async createJudge(ctx, data) {
    return Vue.http.post(`create/judges/newUser`, data);
  },
  async createAdmin(ctx, data) {
    return Vue.http.post(`create/admins/newUser`, data);
  },
  async createSchool(ctx, data) {
    return Vue.http.post(`create/schools`, data);
  },
  async createStudent(ctx, data) {
    return Vue.http.post(`create/students`, data);
  },
  async createCounty(ctx, data) {
    return Vue.http.post(`create/counties`, data);
  },

  // update
  async checkIn(ctx) {
    return Vue.http.put(`update/judges/${ctx.state.operatorId}/checkIn`);
  },
  async checkOut(ctx) {
    return Vue.http.put(`update/judges/${ctx.state.operatorId}/checkOut`);
  },
  async savePreferences({state}) {
    return Vue.http.put(`update/judges/${state.operatorId}/preferences`, { categories: state.categoryPreferences, gradeLevels: state.gradeLevels})
  },
  async approveJudge(ctx, { operatorId }) {
    return Vue.http.put(`update/judges/${operatorId}/approve`);
  },
  async denyJudge(ctx, { operatorId }) {
    return Vue.http.put(`update/judges/${operatorId}/deny`);
  },
  async resetPwdSubmit(ctx, { key, pwd }) {
    return Vue.http.put(`update/pwdReset`, { key, pwd });
  },
  async saveScore(ctx, { score, id }) {
    await Vue.http.put(`update/sessions/${id}`, { score });
  },
  async updateJudge(ctx, data) {
    const { operatorId, ...rest } = data;
    const reqBody = {
      user: _.pick(rest, ['firstName', 'lastName', 'email']),
      operator: _.pick(rest, ['title', 'highestDegree', 'employer']),
      authAccount: _.pick(rest, ['passwordHash']),
    }
    return Vue.http.put(`update/judges/${operatorId}`, reqBody);
  },
  async updateAdmin(ctx, data) {
    const { operatorId, ...rest } = data;
    return Vue.http.put(`update/admins/${operatorId}`, rest);
  },
  async updateSchool(ctx, data) {
    const { operatorId, ...rest } = data;
    return Vue.http.put(`update/schools/${operatorId}`, rest);
  },
  async updateStudent(ctx, data) {
    const { operatorId, ...rest } = data;
    return Vue.http.put(`update/students/${operatorId}`, rest);
  },
  async updateCounty(ctx, data) {
    const { countyId, ...rest } = data;
    return Vue.http.put(`update/counties/${countyId}`, rest);
  },

  async updateJudgingPreferences(ctx, data) {
    const { operatorId, ...rest } = data;
    return Vue.http.put(`update/judges/preferences/${operatorId}`, rest);
  },

  // delete
  async archiveJudge(ctx, { operatorId }) {
    return Vue.http.delete(`delete/judges/${operatorId}`);
  },

  // get
  async getCheckedIn(ctx) {
    const {
      body: res
    } = await Vue.http.get(`read/judges/${ctx.state.operatorId}/checkedIn`);
    console.log(res);
    ctx.commit('UPDATE_CHECKEDIN', res.checkedIn === 1);
  },

  // lists
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
  async refreshJudgeSchedule({ commit, state }) {
    const {
      body: { sessions: judgeSchedule },
    } = await Vue.http.get(`read/judges/${state.operatorId}/schedule`);
    commit('UPDATE_JUDGE_SCHEDULE', judgeSchedule);
  },
  async getJudgeScheduleByOpId(ctx, { operatorId }) {
    return Vue.http.get(`read/judges/${operatorId}/schedule`);
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
  async generateSchedules(ctx) {
    return Vue.http.post('create/generate-schedules');
  },
  async refreshPreferences({ commit, state }) {
    const {
      body: { results: preferences },
    } = await Vue.http.get(`list/judges/${state.operatorId}/preferences`);
    if (preferences) {
      commit('UPDATE_PREFERENCES', preferences);
    } else {
      throw new Error('No preferences found');
    }
  },
  async getAllPreferences({ commit }) {
    const {
      body: { results: preferences },
    } = await Vue.http.get(`list/preferences`);
    if (preferences) {
      commit('UPDATE_GLOBAL_PREFERENCES', preferences);
    } else {
      throw new Error('No preferences found');
    }
  },
  async refreshPendingJudges({ commit }) {
    try {
      const {
        body: { results: judges },
      } = await Vue.http.get('list/judges', {
        params: {
          status: 'registered',
        },
      });
      if (judges) {
        commit('UPDATE_PENDING_JUDGES', judges);
      } else {
        commit('UPDATE_PENDING_JUDGES', []);
      }
    } catch (e) {
      // no pending judges found is not an error
      if (e.body.error !== "UserNotFound") {
        throw e;
      } else {
        commit('UPDATE_PENDING_JUDGES', []);
      }
    }
  },
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
