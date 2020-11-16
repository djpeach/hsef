import Vue from 'vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import store from './store'
import axios from 'axios'

import VueResource from 'vue-resource';
Vue.use(VueResource);

axios.defaults.baseURL = 'http://localhost:9000/api'

Vue.config.productionTip = false
Vue.http.options.credentials = true;
Vue.http.options.root = 'http://localhost:9000/api'


import vuetify from './plugins/vuetify';

new Vue({
  router,
  store,
  vuetify,
  render: h => h(App)
}).$mount('#app')
