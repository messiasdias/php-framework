# Configurações

#### /config/app.php 
> Configurações diretamente realacionadas ao core do App.


```php
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
    'description' => 'MD | PHP Framework - Project',
    'debug' => false,
    'debug_msg' => false,
    'views' => '../assets/views/',
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


```

#### /config/db.php 
> Configurações referentes ao Banco de dados.


```php
/* 
Example Object db config
$this-> [ host| port | database | user| pass ] = 'value';
*/

$this->host = '<ip|hostname>';
$this->port = '3306'; //port mysql default 
$this->database = '<dbname>';
$this->user = '<user>';
$this->pass = '<pass>'; 
```


#### /config/key.php 
> JWT Token HS256 key.

```php 
$key="{your_key_here}";
```

*Uma noma chave será gerada automaticamente se o valor da variável $key for igual a {your_key_here}*

#### /config/middlewares.php 
> Onde definimos methodos mediadores, que podem autorizar ou não determinada tarefa no aplicativo



#### Crindado arquivos de configuração com o Maker
Acessar url
/maker/file/config:[middlewares|db|key|app]