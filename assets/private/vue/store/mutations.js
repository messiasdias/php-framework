export default {

    state : function(state, newState){
        console.log(newState.galery)
        state = newState
    },

    token: function(state, token=false) {
        if( (typeof token == 'string') && ( token.length == 207 ) ){
            state.token = token
            sessionStorage.setItem('token',token)
        }else{
            state.token = false
            sessionStorage.removeItem('token')
        }
    },

    user: function(state, user) {
        if( typeof user == 'object' ){
            state.user = user
        }else{
            state.user = false
        }
    },

    setApi: function(state){
        state.host = (state.host.split(':')[0] == 'localhost' ) ? 'portifolio.local' : state.host
        state.api = state.scheme+"//api."+state.host+"/"
    },


    toggleMenu :function(state, location=false){
        if(state.menu.display == 'none' ){
            state.menu.display = 'block'
        }else{
            state.menu.display = 'none' 
        }

        if(location){
            state.menu.location = location  
        }
       
    },

    galery: function(state, galery) {
        let keys = Object.keys(galery)
        for (let i = 0; i < keys.length; i++) {

            /*if( Object.keys(galery[keys[i]]).length >=2  ){
                let keys2 =  Object.keys(galery[keys[i]]);
                for( let j=0; j < keys2.length; j++ ){
                    //state.galery.$[keys[i]] [keys2[j]] = galery[keys[i]][keys2[j]]
                }

            }else{
               state.galery[keys[i]] = galery[keys[i]]
            } */

            state.galery[keys[i]] = galery[keys[i]]
        }
    },

    toggleTextArea: function( state, args ){

        let method = args.method  ? args.method : false; 
        let comment = args.comment  ? args.comment : false; 
    
        if( !state.galery.reactions.text_area ){
            
            state.galery.reactions.text_area = true
            state.galery.reactions.reply.method = method
            
            if(comment && (method == 'update') ){
                state.galery.reactions.update = comment
                state.galery.reactions.reply.text = comment.text
            }

            if(comment && ((method == 'create') | (method == 'update') ) ){
                state.galery.reactions.reply.galery_id =  comment.galery_id
                state.galery.reactions.reply.item_id =  comment.item_id
            }

            if(comment && ((method == 'create') | (method == 'reply') ) ){
                state.galery.reactions.reply.is_reply_of = comment.id
            }


        }
        
        if( state.galery.reactions.text_area |  (method == 'cancel')  ){
            state.galery.reactions.text_area = false
            state.galery.reactions.reply.method = ''
            state.galery.reactions.update = false
            state.galery.reactions.reply.text = ''
        }

        console.log( args , state.galery.reactions)
    },




    comment: function(state, method='create', comment=false){
        console.log(state, method, comment)
    }
    
  

}