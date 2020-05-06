
let jqueryReady  = function() {
    
    $('.ui-sidebar>.menu>.item').click(function(event){
        event.preventDefault();

        if( !$(this).hasClass('ui-dropdown') ){
            $('.ui-sidebar#sidebar').toggle();
        }
        else {
            let dropdownMenu = $($(event.target).parent().parent().children()[1])
            let id = '#'+dropdownMenu[0].getAttribute('id')
            let href = event.target.getAttribute('href')
    
            if( dropdownMenu.hasClass('ui-dropdown-menu') && ( id === href ) ){
                $('.ui-dropdown-menu'+id).toggle();
            } 
        }
    }) 


    $('.ui-dropdown-item').click(function(event){
        event.preventDefault();
        $(this).parent().toggle();
    });


    $('#sidebar-toggle').click(function(){
        console.log(event.target.getAttribute('id'));
        $('.ui-sidebar#sidebar').toggle();
    });


}


$(document).ready(jqueryReady)


var app = new Vue({
    el: '#app',
    delimiters: ['{', '}'],
    data: {
      message: 'Hello Vue!',
      user: false,
    },

    
});


