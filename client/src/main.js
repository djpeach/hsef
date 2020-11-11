import Vue from 'vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import store from './store'

import VueResource from 'vue-resource';
Vue.use(VueResource);

Vue.config.productionTip = false
Vue.http.options.credentials = true;
Vue.http.options.root = 'http://corsair.cs.iupui.edu:24631/hsef/api'


import vuetify from './plugins/vuetify';

new Vue({
  router,
  store,
  vuetify,
  render: h => h(App)
}).$mount('#app')
