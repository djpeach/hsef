import Vue from 'vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import store from './store'

import VueResource from 'vue-resource';
Vue.use(VueResource);

Vue.config.productionTip = false
Vue.http.options.credentials = true;
Vue.http.options.root = process.env.NODE_ENV === 'production'
  ? "http://corsair.cs.iupui.edu:24361/hsef/api"
  : 'http://localhost:9000/api'


import vuetify from './plugins/vuetify';

new Vue({
  router,
  store,
  vuetify,
  render: h => h(App)
}).$mount('#app')
