//import $ from 'jquery'

export default {

    ajax: function(store, url, method = 'GET', formdata={}, async=false){
        
        /*if( (method.toUpperCase() === 'POST')  && sessionStorage.getItem('token')   ){
            formdata.token =  sessionStorage.getItem('token')
        }
  
        var config = {
            method: method.toUpperCase() ,
            url: url,
            data: formdata, 
            async: async,
            token: sessionStorage.getItem('token') ,
            success : function(response){
                return response
            },
        } 
         
        var data = JSON.parse( $.ajax(config).responseText )
  
        if( data.token ){  
          sessionStorage.setItem('token',data.token)
          this.token = data.token
        }
  
        return data  */
        console.log(store, formdata, async)
        console.log(url,method)
  
      },

      ajax_teste : function({state}){

         this.dispatch('ajax', state.api+'galery/all')
          alert('Action executada!')
          //console.log(data)
      }


}