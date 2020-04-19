
//import './assets.js'
import './../sass/main.scss'
import Vue from 'vue'
import Main from './components/Main.vue'
import store from './store/store'

new Vue({
  el:"#app",
  store,
  render: h => h(Main),
})


