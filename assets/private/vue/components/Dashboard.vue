<template>
<div class="wrapper">
  <navbar />
  <asidebar/>
      
  <div class="content-wrapper">
    <!-- <router-view /> -->
  </div>
  <!--
  <foot/> 
  <controlaside /> -->

</div>
</template>
<script>

import router from '../router.js'
//import header from './dashboard/header.vue'
import asidebar from './dashboard/asidebar.vue'
//import controlaside from './dashboard/control-aside.vue'
import navbar from './dashboard/navbar.vue'

export default {
  name: 'Dashboard',
   router,
   components: {
     navbar,
     asidebar,
     //header,
     //controlaside,
   }

  }
</script>
