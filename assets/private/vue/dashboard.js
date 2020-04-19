import Vue from 'vue'
import Dashboard from './components/Dashboard.vue'
import store from './store/store'

import AdminlteVue from 'adminlte-vue'
Vue.use(AdminlteVue)

new Vue({
  el: "#dashboard",
  store,
  render: h => h(Dashboard),
})


