<?php

/* 
 ## App Config  ###

 Defining: 
 $this->config = (object) array(
     'key' => 'value'
 )

 Using:
 $value = $app->key | $this->key (on App Instânce); 

 */


$this->config = (object) array(
    'timezone' => 'America/Recife',
    'description' => 'Messias Dias | PHP Framework - Project',
    'debug' => true,
    'debug_msg' => false,
    'views' => '../assets/private/views/',
);


$this->maker_config = (object) array(
    
    /* Marker Args */
    'spoon_flag' => '##teste##', // 


    
    /* Marker default Users - optional */ 
    "users" => array (

        // --> Default Admin
        "admin"=>  array ( 
                
                    "first_name" => "Admin",
                    "last_name" => "of System ##teste##",
                    "email" => "admin@teste.ex",
                    "username" => "@admin",
                    "pass" => "123456789",
                    "img"=> "/img/default/avatar-m2.png",
                    "rol"=> 1,
                    "status"=> 1
        ),


        // --> Default Manager 
        "manager"=> array ( 
                
                    "first_name" => "Manager",
                    "last_name" => "##teste##",
                    "email" => "manager@teste.ex",
                    "username" => "@manager",
                    "pass" => "123456789",
                    "img"=> "/img/default/avatar-m3.png" ,
                    "rol"=> 2,
                    "status"=> 1 
        ),
    
        // --> Default User
        "user" =>  array ( 
                    "first_name" => "User",
                    "last_name" => "##teste##",
                    "email" => "user@teste.ex",
                    "username" => "@user",
                    "pass" => "123456789",
                    "img"=> '/img/default/avatar-m2.jpg',
                    "rol"=> 3,
                    "status"=> 1
                )
    ),
    
        
    
    

);
