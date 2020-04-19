import Vue from 'vue'
import VueRouter from 'vue-router'
import Http from './components/main/http.vue' 
import Home from './components/main/home.vue' 
import Dashboard from './components/Dashboard.vue' 


const router = new VueRouter({
    mode: 'history',
    routes: [
      // Home 
      { path: '/2',
        alias: '/home2' ,
        name: 'Home',
        component: Home,  
      },

      // Dashboard 
      { path: '/admin',
        alias: '/login' ,
        name: 'Dashboard',
        component: Dashboard,  
      },
  
      // NotFound
      { path: '*',
        name: 'Http',  
        component: Http,
        props:{
          code: "404",
          msg: "Not Found"
        }
       },
  
    ]
  
}) 
  
Vue.use(VueRouter)
export default router