<script src="../assets/public/js/jquery.min.js"></script> 

<img src="https://github.com/messiasdias/md-php-framework-project/assets/public/img/default/md-logo2.png" width="120" />

## Get Started

<!-- start Iniciando um Projeto -->
<details  >
<summary>Iniciando um projeto</summary>
<md id="start"></md>

<script >
  //$('#start').load("start.md").wrap('<pre>'); 
  //$("#start").load("start.md").wrap('<pre>');
//$( "#start" ).replaceWith( "start.md" ).wrap('<pre>')
$('#start').load("start.md")
</script>


 
</details>
<!-- end Iniciando um Projeto -->




<!-- start /assets -->
<details>
  <summary>/assets</summary>


<!-- start /assets/private -->
  <details>
    <summary>/assets/private</summary>
    private
  </details>
 <!-- end /assets/private --> 


<!-- start /assets/public -->
 <details>
    <summary>/assets/public</summary>
    public
  </details>
<!-- end /assets/public -->  

 
</details>
<!-- end  /assets -->






<!-- start /config -->
<details>
  <summary>/config</summary>

## Configurações

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

 
</details>
<!-- end  /config -->



<!-- start  /docs -->
<details>
<summary>/docs</summary>
docs
</details>
<!-- end  /docs -->




<!-- start  /public|api -->
<details>
<summary>/public | /api</summary>
public | api
</details>
<!-- end  /public|api -->




<!-- start  /src -->
<details>
  <summary>/src</summary>


  <!-- start  /src/Controllers -->
  <details>
    <summary>/src/Controllers</summary>
    /src/Controllers
  </details>
  <!-- end  /src/Controllers -->



  <!-- start  /src/Database -->
  <details>
    <summary>/src/Database</summary>
    /src/Database
  </details>
  <!-- end  /src/Database -->



  <!-- start  /src/Models -->
  <details>
    <summary>/src/Models</summary>
    /src/Models
  </details>
  <!-- end  /src/Models -->




  <!-- start  /src/Routers -->
  <details>
    <summary>/src/Routers</summary>

## Definindo Rotas

Todos os Arquivos de Rotas encontram-se em */src/Routers/*, as rotas definidas nos arquivos desse diretório serão carregadas quando usamos do argumento *'app'*. Caso queira carregar as rotas para a api, lembre-se que deve indicar isso ao instâciar *App* em /api/index.php com o argumento *'api'*.
Os Arquivos de rotas para api encontram-se em */src/Routers/api/*


#### Criando um Arquivo de Rota

Um arquivo de rota é um arquivo .php simples que é incluso no construtor de App, e carrega as rotas para o array *$app->routers*.
O acesso a qualquer methodo ou variavel dar-se apratir do objeto *$app* que recebe a Instância da Classe *App* no index.php. Sabendo disso, vamos partir para a definição das rotas propriamente ditas.

A estrutura básica é:

> $app->{method} ( {name} , {callback} , {middlewares} );

- **method**: Os metodos são get, post, put ou delete 
- **name**: Recebe um String com nome ou assinatura, o que Define a Url,

>	/home ou /
    
  Se o você deseja receber valores atraves das rotas, deve definir os atributos para tal. Digamos que eu queira receber o ID de um usuário para executar determinada função ou receber valores referentes a esse.

> /user/{id}    

Se quiser ter um melhor filtro dos dados passados e principalmente evitar ambiguidade de assinaturas, deve indicar o tipo primitivo de dado aceito incluindo ou não número mínimo e maximo de caracteres aceitos, 
separados com um '|' (pipe) entre os filtros, e um ':' (dois pontos) para separar os valores para o filtro. 

>/user/{id}int|minlen:1|mincount:1

>/user/{name}string|minlen:1|maxlen:256|nonull

[Saber Mais Sobre Filtros](http://github.com)
	
- **callback**: Recebe uma Função que será executada conforme a permissão do middleware, esta deve receber no primeito parâmetro a variavel $app e no segundo eventuais valores passados via url como no exemplo acima.
A variavel $args recebe um objeto com todos os valores passados.
Ao finalizar o codigo na função sempre retorne $app.
	
> Na assinatura: /user/{id}  
> No nallback: $args->id


- **middlewares**: Recebe um Array de strings ou uma string com os nomes referentes àos niveis de acesso. Se nada for especificado   variavel recebe o valor *null* (nulo) , e não faz filtragem de acesso, todos tem acesso a rota em questão. 

	[Saber Mais Sobre Middlewares](http://github.com)


Vamos Criar o arquivo exemplo1.php:

> src/Routers/exemplo1.php

``` 
$app->get('/home', function($app,$args){ 

  	echo "Home Ok!";
    return $app;
        
} );

$app->get('/users/{id}int', function($app,$args){ 
	
    $app->response->write( 'Id do Usuário: '.$args->id );
    return $app;
       
} , null);
``` 
 

  </details>
  <!-- end  /src/Routers -->


  <!-- start  /src/Viewfilters -->
  <details>
    <summary>/src/Viewfilters</summary>
    /src/Viewfilters
  </details>
  <!-- end  /src/Viewfilters -->




</details>
<!-- end  /src -->




</details>
<!-- end  /src -->





