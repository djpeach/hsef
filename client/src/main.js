import Vue from 'vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import store from './store'
import qs from 'qs';

import axios from 'axios';
axios.defaults.baseURL = process.env.NODE_ENV === 'production'
  ? 'http://corsair.cs.iupui.edu:24631/hsef/api'
  : 'http://localhost:9000/api';

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
