export default  {
    scheme: location.protocol , //string http|https
    host: window.location.host , //string|url
    url: window.location.pathname, //Present Url
    api: '', // this.setApi() method set
    assets:'', //assets - public path img, css, js ...

    //user
    user: false, //object 
    token: sessionStorage.getItem('token') ? sessionStorage.getItem('token') :  false, //string

    //screen
    menu: {
     display:'none',
     location : 'home'
    },

    screen :{
        width: window.innerWidth,
        height: window.innerHeight,
    },

    //galery
    galery :{ 
        show: 6,
        search:'',
        type: 'all',
        itens:false,

        single: {
            item:false,
            index:false
        },
        
        reactions:{
            show: 3,
            reply:{
              text:'',
              galery_id:'',
              item_id: '',
              method: '', // create | update | delete
              is_reply_of:'',
            },
            reply_view: '', 
            update:false,
            text_area:false,
        },


    },

    //modal 
    modal : {
      visible: false,
      title: 'Modal Teste Titulo',
      content: '',
    },
    
}
