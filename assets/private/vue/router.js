import Vue from 'vue'
import VueRouter from 'vue-router'
import Http from './components/Http.vue' 
import Home from './components/Home.vue' 


const router = new VueRouter({
    mode: 'history',
    routes: [
      // Home 
      { path: '/2',
        alias: '/home2' ,
        name: 'Home',
        component: Home,  
      },
  
      // NotFound
      { path: '*',
        name: 'Http',  
        component: Http,
        props:{
          error: 404
        }
       },
  
    ]
  
}) 
  
Vue.use(VueRouter)
export default router