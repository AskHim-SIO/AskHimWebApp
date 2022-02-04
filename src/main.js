import Vue from 'vue'
import App from './App.vue'
import router from './router'
import middleware from "@grafikri/vue-middleware"
import InfiniteLoading from 'vue-infinite-loading';
import Debounce from 'debounce'


Vue.use(Debounce)
Vue.use(InfiniteLoading);
Vue.config.productionTip = false

router.beforeEach(middleware())


new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
