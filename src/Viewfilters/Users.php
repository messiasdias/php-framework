<?php 


//is_self
$view->addFunction( 
    new \Twig\TwigFunction('is_self', function (Object $user_item) {
        if( $this->app->user() && (   $user_item->id == $this->app->user()->id  ) ) { 
            return  true;
        }
        return false;
    })
);


//user_rol_name
$view->addFunction( 
    new \Twig\TwigFunction('user_rol_name', function (int $rol=null) {
    
        if( is_null($rol) && $this->app->user() ){
            $rol = $this->app->user()->rol;
        }

        switch ($rol) {
            case 1:
                return 'admin';
            break;

            case 2:
                return 'manager';
            break;

            case 3:
                return 'user';
            break;
            
            default:
              return 'guest';
            break;
        }

    })
);



//name_encode
$view->addFunction( 
    new \Twig\TwigFunction('name_encode', function ($name) {
        return str_replace( ['%20',' '],'-',strtolower($name)) ;
    })
);   