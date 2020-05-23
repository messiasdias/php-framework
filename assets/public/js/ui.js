let breakpoints = {
    xs: 0,
    sm: 576,
    md: 768,
    lg: 992,
    xl: 1200
}




let jqueryReady  = function() {

    $(this).click(function(event){
        console.log(event.clientX, event.clientY, $(".ui-dashboard-left") )
        if( $(".ui-dashboard-left").is(':visible') ){
           // $(".ui-dashboard-left").toggle()
        }
    })
    
    $('.ui-sidebar>.menu>.item').click(function(event){
        event.preventDefault();

        if( !$(this).hasClass('ui-dropdown') ){
            $(".ui-dashboard-left").toggle()
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


    $('.ui-sidebar-toggle').click(function(){
        event.preventDefault()
        $(".ui-dashboard-left").toggle()

        if( $(".ui-dashboard-right").width() >= breakpoints.lg ) {
            if( $(".ui-dashboard-left").is(':visible') ){
                $(".ui-dashboard-right").width('75%')
            }else{
                $(".ui-dashboard-right").width('100%') 
            }
        }else{
            $(".ui-dashboard-right").width('100%') 
        }
        //console.log($(".ui-dashboard-right").width(), $(".ui-dashboard-left").is(':visible'))

    });


    $('.ui-sidebar-close').click(function(event){

        event.preventDefault()
        //console.log(event.target,  $(".ui-dashboard-left").width() ) ;

        console.log($(".ui-dashboard-right").css('width') )

        if( $(".ui-dashboard-right").width() >= breakpoints.lg ){
           
            if( $(".ui-dashboard-left").is(':visible') ){
                $(".ui-dashboard-right").css('width', 'initial' );
            }else{
                $(".ui-dashboard-right").css('width', '100%' ) ; 
            }

        }
    })


}


$(document).ready(jqueryReady)


