
//import './assets.js'
import './../sass/main.scss'
import Vue from 'vue'
import App from './components/App.vue'
import store from './store/store'

new Vue({
  el:"#app",
  store,
  render: h => h(App),
})


