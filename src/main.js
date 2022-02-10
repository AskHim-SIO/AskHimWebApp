import Vue from 'vue'
import App from './App.vue'
import router from './router'
import middleware from "@grafikri/vue-middleware"
import InfiniteLoading from 'vue-infinite-loading'
import Debounce from 'debounce'
import Vuex from 'vuex'
import { LMap, LTileLayer, LMarker } from 'vue2-leaflet';
import 'leaflet/dist/leaflet.css';
import { Icon } from 'leaflet';

Vue.use(Debounce)
Vue.use(InfiniteLoading);
Vue.use(Vuex)

Vue.component('l-map', LMap);
Vue.component('l-tile-layer', LTileLayer);
Vue.component('l-marker', LMarker);



delete Icon.Default.prototype._getIconUrl;
Icon.Default.mergeOptions({
  iconRetinaUrl: require('leaflet/dist/images/marker-icon-2x.png'),
  iconUrl: require('leaflet/dist/images/marker-icon.png'),
  shadowUrl: require('leaflet/dist/images/marker-shadow.png'),
});
Vue.config.productionTip = false

router.beforeEach(middleware())


new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
