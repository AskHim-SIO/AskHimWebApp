import Vue from 'vue'
import App from './App.vue'
import router from './router'
import middleware from "@grafikri/vue-middleware"


var VueCookie = require('vue-cookie');

Vue.use(VueCookie);
Vue.config.productionTip = false

router.beforeEach(middleware())


new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
