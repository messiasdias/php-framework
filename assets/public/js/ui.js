const breakpoints = {
    xs: 0,
    sm: 576,
    md: 768,
    lg: 992,
    xl: 1200
}

const sidebar = $('.ui-dashboard-left');


let screenWidthXLarge = function(){
    return ( $(document).width() >=  breakpoints.xl )
}

let screenWidthLarge = function(){
    return ( $(document).width() >=  breakpoints.lg ) && ( $(document).width() <  breakpoints.xl );
}

let screenWidthMedium = function(){
    return ( $(document).width() >=  breakpoints.md ) && ( $(document).width() <  breakpoints.lg );
}

let screenWidthSmall = function(){
    return ( $(document).width() >=  breakpoints.sm ) && ( $(document).width() <  breakpoints.md );
}

let screenWidthXSmall = function(){
    return ( $(document).width() >  breakpoints.xs ) && ( $(document).width() < breakpoints.sm );
}


let normalizeLayout = function(){

    if( sidebar.is(":visible") ){  

        if( screenWidthLarge() | screenWidthXLarge()  ) {
            $(".ui-dashboard-right").css('width', '75%' )
        }else{
            $(".ui-dashboard-right").css('width', '100%' )
        }
        
    }else{
        $(".ui-dashboard-right").css('width', '100%' )
    }

}


let jqueryReady  = function() {

    
    $('.ui-sidebar>.menu>.item').click(function(event){
       

        toggleIfLG = function(){
            if( $(document).width() < breakpoints.lg ) 
            {
                sidebar.toggle("fast")
            }
        }

        if( !$(this).hasClass('ui-dropdown') )
        {
            toggleIfLG()
        }
        else 
        {
            event.preventDefault()

            let dropdownMenu = $($(event.target).parent().parent().children()[1])
            let id = '#'+dropdownMenu[0].getAttribute('id')
            let href = event.target.getAttribute('href')
    
            if( dropdownMenu.hasClass('ui-dropdown-menu') && ( id === href ) ){
                $('.ui-dropdown-menu'+id).toggle("fast");
            }else{
                toggleIfLG()
            } 

        }

        normalizeLayout()
    }) 



    $('.ui-dropdown-item').click(function(){
        $(this).parent().toggle("fast")
        normalizeLayout()
    })


    $('.ui-sidebar-toggle').click(function(){
        sidebar.toggle("fast")
        normalizeLayout()
    })



    $(this).mouseup(e => {
       if (!sidebar.is(e.target) && sidebar.has(e.target).length === 0) 
       { 
            sidebar.hide()
            normalizeLayout()
       }
      
    })
    

    $(this).scroll(function(){ 
        normalizeLayout() 
    })


    $(this).resize(function(){ 
        normalizeLayout() 
    })
    
}


$(document).ready(jqueryReady);

