import Vue from 'vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import store from './store'
import axios from 'axios'

import VueResource from 'vue-resource';

Vue.use(VueResource);

// only for file upload
axios.defaults.baseURL = process.env.NODE_ENV === 'production'
  ? "http://corsair.cs.iupui.edu:24631/hsef/api"
    : 'http://localhost:9000/api'

Vue.config.productionTip = false
Vue.http.options.credentials = true;
Vue.http.options.root = process.env.NODE_ENV === 'production'
  ? "http://corsair.cs.iupui.edu:24631/hsef/api"
    : 'http://corsair.cs.iupui.edu:24631/hsef/api'
    //: 'http://localhost:9000/api'


import vuetify from './plugins/vuetify';

new Vue({
  router,
  store,
  vuetify,
  render: h => h(App)
}).$mount('#app')
