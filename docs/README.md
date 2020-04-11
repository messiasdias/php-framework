# Get Started


#### Start
* [Iniciando Projeto](#start)
* [Configurações](#config)

#### Rota e MVC 
* [Routers](#routers)
* [Controllers](#controllers)
* [Models](#models)
* [Views](#views)


#### DataBase
* [Migrations](#migrations)
* [Seeds](#seeds)


#### Assets
* [Public](#assets-public)
* [Private](#assets-private)



#### Outros
* [Public](#files)
* [Private](#validator)








## <a id="start"> Iniciando Projeto

* [Composer](https://getcomposer.org/download/) 

```bash
composer create-project -s dev messiasdias/md-php-framework-project
```
* [Git](https://github.com/messiasdias/md-php-framework-project)
```bash
git clone https://github.com/messiasdias/md-php-framework-project.git <nome_do_diretorio_opcional>
```


### Preparando o Servidor
Primeiramente devemos ativar o ***modulo Rewrite*** nosso Servidor Web, nesse exemplo utilizamos o Apache2 no Ubuntu Server, Debian e derivados.

Para ativar no Linux o comando é:
```bash
 sudo a2enmod rewrite
 sudo service apache2 reload
```

### /public ou /api
Apartir do diretório do projeto criado acima, Se não existir, crie os seguintes arquivos:

* /public/.htaccess  e/ou 
* /api/.htaccess (opcional)

com o conteúdo abaixo:

```apache
RewriteEngine On
RewriteCond %{SCRIPT_FILENAME} !-f
RewriteCond %{SCRIPT_FILENAME} !-d
RewriteRule ^(.*)$ index.php
Options All -Indexes
```


Ainda no diretório do projeto , Se não existir, crie os seguintes arquivos:

*  /public/index.php  e/ou
*  /api/index.php (opcional)

```php
<?php
require_once "../vendor/autoload.php";
use App\App;

/* 
Start App using the argument 'app' for site/App, 
or with argument 'api'for API
-----------------------------------------------
Iniciar App usando o argumento 'app' 
Para site/App ou com o argumento 'api' Para API.
*/

$app = new App('app'); // 
$app->run();
```

O Argumento passado ao instanciar *APP*, deve ser levado em consideração muita importância,é esse argumento o gatilho para carregar os arquivos das rotas para o Site ou API, que por sua vez ficam em diretórios distintos.


### Gerenciando dependências  com Composer ( PHP )

### /
* Instalando dependências do projeto PHP
```
composer install
```

* Iniciando servidor de Desenvolvimento (Template View Twig e Back-End PHP)
```
composer dev 
```
ou 

```
composer serve
```


### Gerenciando dependências com NPM ( JavaScript )
Instalando dependências do projeto Javascript
```
npm install
```

* Iniciando servidor de Desenvolvimento (Template View VueJs)
```
npm run dev 
```
ou 

```
npm run serve
```


* Construindo versão de Produção (Rode a cada construção)
```
npm run build
```






## <a id="config"> Configurações </a>





#### Criando arquivos de configuração com o Maker
*  Via Browser url
```
/maker/file/config:[middlewares|db|key|app]
```
> Para Ajuda
```
/maker
```

* Via CLI

No diretório raiz do projeto:
```
composer maker file config [middlewares|db|key|app]
```
> Para Ajuda
```
composer maker 
```


### /config/app.php 
> Configurações diretamente relacionadas ao core do App.


#### $this->config->debug [true| false ]
Ativa ou desativa opção debug do App, responsavel por diversas opções de que só devem ser ativas durante o desenvolvimento, como utilizar o Maker via URL.

#### $this->config->timezone ['America/Recife']
String Timezone ou fuso horário local.

#### $this->config->description[String]
Texto Breve de descrição da aplicação. 

#### $this->config->views = ['../assets/private/views/' ]
String path/caminho do riretório padrão dos templates view Twig;



```php
/* 
 ## App Config  ###

 Defining: 
 $this->config->key = 'value';

 Using:
 $value = $app->key | $this->key (on App Instânce); 

 */

$this->config->debug = true;
$this->config->timezone = 'America/Recife';
$this->config->description = 'Messias Dias | PHP Framework - Project';
$this->config->views = '../assets/private/views/';


```

### /config/db.php 
> Configurações referentes ao Banco de dados.


#### $this->host
Hostname ou ip do servidor de banco de dados

#### $this->port
Porta do servidor 

#### $this->database
Nome da base de dados

#### $this->user
Nome do usuário

#### $this->pass
Senha do usuário


```php
/* 
Exemplo de configuração do Banco de Dados Mysql 

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


### /config/maker.php 

> Configurações do Maker

#### $this->spoon_flag 
Marcação de item de teste

#### $this->seeder_objects
Dados predefinidos para serem propagados no seu banco de Dados usando as classes App\Database\Seeds, armazenadas em src/Database/Seeds.


```php 
<?php
 /* Marker Config */
 // Marcação de item de teste | Spoon Flag
 $this->spoon_flag  = '##teste##'; 

 /*
  Objetos que podem ser Predefinidos para os Seeders
*/

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
```





### /config/middlewares.php 
> Onde definimos methodos mediadores


#### $this->middlewares = (object) [] 
Recebe um objeto com funções denominadas middlewares/mediadores, estes podem autorizar ou não determinada tarefa no aplicativo e devem ter um retorno do tipo Boolean true ou false.

```php
<?php
use App\App;

/* Middlewares 

    ex: 
   
 $this->middlewares = (object) [   

    'name' => function(App $app, object $middleware_obj){
        return true;
    },

    ...
 ];

*/

$this->middlewares = (object) [

    //debug
    'debug' => function (App $app){
        return $app->config->debug;
    }, 

    //guest
    'guest' => function(App $app){
        return !$app->user() ? true : false;
    },

    //admin
    'admin' => function(App $app){
        return ( $app->user() && ($app->user()->rol == 1 ) ) ;
    },


    //manager
    'manager' => function(App $app){
        return ( $app->user() && ($app->user()->rol == 2) ) ;
    },

    //user
    'user' => function(App $app){
        return ( $app->user() && ($app->user()->rol == 3) ) ;
    },


    //auth
    'auth' => function(App $app){
        return $app->user() ? true : false;
    },
    

    
    /*
    Exemplo is_self
    
    //is Self
    'is_self' => function(App $app, object $obj){
        if( isset($obj)){
            return $app->user()->id == $obj->id ? true : false;
        }
        return false;
    },
    */
];

```



# MVC

## <a id="routers">Routers</a>


### Definindo Rotas


#### Criando arquivos de rota com o Maker
*  Via Browser url
```
/maker/file/route:[app|api]:<nome_da_rota>
```
> Para Ajuda
```
/maker
```

* Via CLI

No diretório raiz do projeto:
```
composer maker file route:[app|api]|<nome_da_rota>
```
> Para Ajuda
```
composer maker 
```


Os arquivos de rota são armazenados em src/Routers e src/Routers/api (para rotas do modo api)

#### Estrutura de uma Rota


> $app-><get|post|put|delete>([$url](routers-url),[$callback](routers-callback),[$middlewares](routers-middlewares) );

Rota método Get simples
```php

$app->get('/test', function($app,$args){
    echo "Test route Ok!"
    return $app;
}, null);
```

Rota método Get passando parâmetros para a função callback, no exemplo abaixo, temos o parâmetro `text|String`.
Isso quer dizer que o valor passado na url após `/test/` será validado, e se este valor for do tipo string será atribuído ao objeto `$args`.
Podemos fazer o Mesmo para o tipo inteiro com por exemplo `{id|int}`.

O pipe `|` é o separador das validações que definimos para determinado valor na url e em diversos locais da apliação utilizando o metodo estático `App::validate()`.
O App\Http\Router utiliza desse método para validar as rotas.
[Para mais Validações com App::validate()](#validator)


```php
$app->get('/test/{text}string', function($app,$args){
    echo "The text value is: " . $args->text;
    return $app;
}, null);
```

Recebendo dados de um formulário atraves do método POST array `$app->request->data`.

As chaves do array correspondem aos seus atriubutos `name` definido no desenvolvimento da interface ou json.

```php
$app->post('/url', function($app,$args){
    //post data
    var_dump($app->request->data);
    return $app;
}, null);
```


Retornando uma [View](#views) 
```php
$app->get('/url', function($app,$args){
    return $app->view('test');
}, null);

```

Retornando um Json
```php
$app->get('/url2', function($app,$args){
    return $app->json(['test' => 'Test Value!']);
}, null);

```

Retornando um [Controller](#controllers)
> '@' é o separador, equanto 'index' refere se ao método do objeto controller Test, ambas as arbodagens terá o mesmo resultado, pois se não passado nome do método após o '@', será executado o método index do controller. 


```php
$app->post('/url', function($app,$args){
    return $app->controller('teste@index');
}, null);

//ou 

$app->post('/url', function($app,$args){
    return $app->controller('teste');
}, null);
```


Nossa aplicação pode responder de dois "modos" (assim chamdos) via url: App e Api.
sabendo disso temos dois possíveis caminhos de retorno para o usuário ou outra aplicaçõa consumidora da api.

No modo App retornamos uma view para usuário,
No modo Api retornamos um Json.

Para com uma unico método implementar rotas app e api, podemos utilizar a função `$app->mode_trigger()`, esta recebe como parâmetros 
* Primeiro | Uma função callback que será executada no modo App
* Segundo | Uma função callback que será executada no modo App
* Terceiro | Uma objeto/array/string que será repassado para o escopo da função callback.

```php
$app->get('/url', function($app,$args){

    $data = ['test' => 'Teste ok!'];

    return $app->mode_trigger(
        //callback modo App
        function ($app, $args, $data) {
            return $app->view('test', $data);
        },
        ////callback modo Api
        function ($app, $args, $data) {
            return $app->json($data);
        },
        //$data objeto repassado para o escopo interno
        $data
    );

}, null);

```



#### Grupos de Rotas

> $app->router_group( array $config, function $callback, string|array $middlewares );



* $config exemplo 1
> Nesse exemplo, ambas utilizam a mesma função callback e a mesma definição e middlewares (mediadores), ou seja, acessando ambas urls teremos a mesma resposta.
Porém sem méthodo definido, será assumido o método GET. 


```php
[ '/url', '/url2' ]
```


* $config exemplo 2
> Nesse exemplo, podemos definir diferentes métodos para mesmos atributos url, callback, [middlewares](#middlewares).

```php
[
    [
        'url' => '/url/{id}int|maxcount:10', 
        'method' => 'GET'
    ],
    

    [
        'url' => '/url/{id}int|maxcount:10',
        'method' => 'POST'
    ],

    [
        'url' => '/url2', //Asume GET
        'callback' => function(){
            /*code*/
        }
    ],

    //...
]
```

Definindo group:

```php
$app->router_group([ '/url', '/url2' ], function($app,$args){ 
    echo   "Test Route Group OK!";
    return $app;
}, array | string $middlewares = null);




$app->router_group([
    [
        'url' => '/url/{id}int|maxcount:10', 
        'method' => 'GET'
    ],
    

    [
        'url' => '/url/{id}int|maxcount:10',
        'method' => 'POST'
    ],

    [
        'url' => '/url2', //Asume GET
        'callback' => function($app, $args){
           echo   "Test 2 OK!";
           return $app;
        }
    ],

], 

function($app,$args){ 
    echo   "Test ID is: ".$args->id;
    return $app;
}, array | string $middlewares = null);





$app->router_group([
    [
        'url' => '/url/{id}int|maxcount:10', 
        'callback' => function($app, $args){
            echo   "Is int ID is: ".$args->id;
            return $app;
        }
    ],
    [
        'url' => '/url/{text}string|maxlen:10',
        'callback' => function($app, $args){
            echo   "Is string Text is: ".$args->text;
            return $app;
        }
    ]
]);

```





## <a id="controllers">Controllers</a>