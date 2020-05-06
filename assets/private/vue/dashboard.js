import Vue from 'vue'
//import Dashboard from './components/Dashboard.vue'
import store from './store/store'

//npm install @coreui/vue


new Vue({
  el: "#dashboard",
  store,
  render: h => h(Dashboard2),
})


