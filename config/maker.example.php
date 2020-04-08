<?php
 /* Marker Config */

 //Marcation flag on item | Spoon Flag
$this->spoon_flag  = '##teste##'; 


// Seeder objects create predefinition
$this->seeder_objects = (object) [

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
    
];

