# Get Started


#### Start
* [Iniciando um Projeto](#start)
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
* [Validator](#validator)
* [File](#File)








## <a id="start"> Iniciando um Projeto

* [Composer](https://getcomposer.org/download/) 

```bash
composer create-project -s dev messiasdias/php-framework <nome_do_diretorio_opcional>
```
* [Git](https://github.com/messiasdias/php-framework)
```bash
git clone https://github.com/messiasdias/php-framework.git <nome_do_diretorio_opcional>
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
Start App using the argument 'mode' => 'app' for site/App, 
or with argument 'mode' => 'api'for API
-----------------------------------------------
Iniciar App usando o argumento 'mode' => 'app' 
Para site/App ou com o argumento 'mode' => 'api' Para API.
*/

$app = new App([ 'mode' => 'app']); // 
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

Os arquivos de configuração são armazenados em `/config`.


### /config/app.php 
> Configurações diretamente relacionadas ao core do App.


##### $this->config->debug [true| false ]
Ativa ou desativa opção debug do App, responsável por diversas opções de que só devem ser ativas durante o desenvolvimento, como utilizar o Maker via URL.

##### $this->config->timezone ['America/Recife']
String Timezone ou fuso horário local.

##### $this->config->description[String]
Texto Breve de descrição da aplicação. 

##### $this->config->views = ['../assets/private/views/' ]

String path/caminho do riretório padrão dos templates view Twig, que por padrão são armazenados em `assets/private/views/`.



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


##### $this->host
Hostname ou ip do servidor de banco de dados

##### $this->port
Porta do servidor 

##### $this->database
Nome da base de dados

##### $this->user
Nome do usuário

##### $this->pass
Senha do usuário


```php
/* 
$this-> [ host| port | database | user| pass ] = 'value';
*/
$this->host = '<ip|hostname>';
$this->port = '3306'; //port mysql default 
$this->database = '<dbname>';
$this->user = '<user>';
$this->pass = '<pass>'; 
```


#### /config/key.php 
> JWT Token HS256 key. Uma noma chave será gerada automaticamente se o valor da variável $key for igual a {your_key_here}*

```php 
$key="{your_key_here}";
```



### /config/maker.php 

> Configurações do Maker

##### $this->spoon_flag 
Marcação de item de teste

##### $this->seeder_objects
Dados predefinidos para serem propagados no seu banco de Dados usando as classes `App\Database\Seeds`, armazenadas em `src/Database/Seeds`.


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


##### <a id="middlewares">$this->middlewares = (object) [] </a>
Recebe um objeto com funções denominadas middlewares/mediadores, estes podem autorizar ou não determinada tarefa no aplicativo e devem ter um retorno do tipo Boolean true ou false.

```php
use App\App;

/* 
Middlewares ex: 

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
Podem ser usadas como mediador do [callback](#routerscallback) de uma rota, ou diretamente durante checagens em qualquer lugar da aplicação com acesso a instância de $app atravez da função middlewares.

####  $app->middlewares( strinbg|array $list, object $obj, boolean $return_app=false)

```php
    $app->middlewares()
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


Os arquivos de rota são armazenados em `src/Routers` e `src/Routers/api` (para rotas do modo api)

#### Estrutura de uma Rota


##### $method => [get | post| put | delete ]

#### $app->$method ( [string $url](routersurl), [function $callback](routerscallback), [array|string $middlewares](#middlewares) );

Rota método Get simples
```php
$app->get('/test', function($app,$args){
    echo "Test route Ok!"
    return $app;
}, null);
```

####  <a id="routersurl" > string $url </a>
Primeiro parâmetro do app route. A assinatura da rota em si. Nesse podemos usar o artifício da validação. 
O pipe `|` é o separador das validações que definimos para determinado valor na URL e em diversos locais da apliação utilizando o metodo estático `App::validate()`.
O App\Http\Router utiliza desse método para validar as rotas.

[Para mais Validações com App::validate()](#validator)



####  <a id="routerscallback" > function $callback </a>
Segundo parâmetro do app route. Consiste em uma Função de retorno definida na rota e executada caso corresponda os critérios dos middlewares (mediadores).
Esta recebe os seguintes parâmetros em ordem: `$app` e `$args` e retorna `$app` sempre.

####  <a id="routersmiddlewares" > array | string $middlewares </a>
Terceiro parâmetro do app route são as funções [Middlewares/Mediadores](#middlewares) mediadores, estes podem autorizar ou não seguir o roteamento e executar a função callback.


#### Exemplos

Rota método Get passando parâmetros para a função callback, no exemplo abaixo, temos o parâmetro `text|String`.
Isso quer dizer que o valor passado na url após `/test/` será validado, e se este valor for do tipo string será atribuído ao objeto `$args`.
Podemos fazer o Mesmo para o tipo inteiro com por exemplo `{id|int}`.



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


Redirecionando rota 

```php
$app->post('/url', function($app,$args){
    //redirect with out refresh $app object
    return $app->redirect('/url');
}, null);
//ou 
$app->post('/url', function($app,$args){
    //redirect with refresh $app object
    return $app->redirect_head('/url');
}, null);
```


Nossa aplicação pode responder de dois "modos" (assim chamdos) via url: `App` e `Api`.
sabendo disso temos dois possíveis caminhos de retorno para o usuário ou outra aplicaçõa consumidora da api.

No modo App retornamos uma view para usuário,
No modo Api retornamos um Json.

Para com uma unico método implementar rotas app e api, podemos utilizar a função `$app->mode_trigger()`, esta recebe como parâmetros 
* Primeiro | Uma função callback que será executada no modo App
* Segundo | Uma função callback que será executada no modo Api
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
        //$data objeto passado para o escopo interno
        $data
    );

}, null);

```



#### Grupos de Rotas

> $app->router_group(array $config, function $callback, string|array $middlewares );



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

Os controllers são reponsáveis por interligar Views e Model (Intefaces do usuário e Lógida interna dos modelos). Podemos chamalos diretamente dentro da definição de uma rota.
E estes são opcionais quando não há necessidade de uso.
Por exemplo: tenho uma rota com o método GET que simplesmente apresenta uma view. Não faria sentido implementar um Controller exclusivamente pra apresentar uma view. 

Do contrário, faz todo o sentido, já que é sim uma boa prática reutilizar código segundo o padrão de arquitetura de software MVC formulado na década de 1970 focado no reuso de código e a separação de conceitos em três camadas interconectadas, onde a apresentação dos dados e interação dos usuários (front-end) são separados dos métodos que interagem com o banco de dados (back-end).



### Criando arquivos de classe Controller com o Maker
* Via Browser url
```
/maker/file/controller:<nome_da_class>
```
>Para Ajuda
```
/maker
```
* Via CLI
No diretório raiz do projeto:
```
composer maker file controller:<nome_da_class>
```
> Para Ajuda
```
composer maker 
```


> Os arquivos de classe Controller são armazenados em src/Controllers.


#### Estrutura de um Controller

```php
namespace App\Controllers;
use App\Controller\Controller;
use App\App;
/**
 * TestController Class
 */
class Test extends Controller
{	public $app;
	
	function __construct(App $app=null)
	{
		$this->app = $app;
	}


	public function index($app, $args=null){
        /* code */
		return $app;
    }
    
    public function outher($app, $args=null){
        /* code */
		return $app;
	}
}
```

Como numa rota, podemos usar qualquer função de `$app` como:

* #### $app->write(string $text, string $type [json|html], int $response_code = 200 )

Retorna um texto na Tela  do Usuário.
sem template, este Pode conter ou não tags html. 

* #### $app->view(string $template, array $data, $string $path = '../assets/private/views/')

Retorna uma view teplate para o usuário.
* #### $app->json(array $data, int $response_code = 200)

Retorna um texto em formato de objeto JSON.

* #### $app->mode_trigger(function $app, function $api, $data)

Que ao depender do modo da aplicação Retorna uma View ou um texto em formato de objeto JSON.

* #### $app->redirect(string $url, string $method = "GET", array $data=null)

Redireciona rota sem refresh no objeto $app, com a possibilidade de enviar um array $data.

* #### $app->redirect_header(string $url)

Redireciona rota com refresh no objeto $app via header.

[Para Mais funcões do objeto $app](#app)


### Invocando um Controller dentro de uma Rota

Assumindo que definimos a Classe  Controller `Test` em `src/Controllers`, e dentro da definição de um rota ou função de outro controller, podemos invocar a classe Test da seguinte forma:

> '@' é o separador, equanto 'index' refere se ao método do controller Test, ambas as arbodagens terão o mesmo resultado, pois se não passado nome do método após o '@', será executado o método index do controller.
Esse deve ser sempre implamentado segundo `App\Controller\ControllerInterface`.


Invocando função `index` no controller Test
```php
$app->controller('Test@index');
//ou 
$app->controller('Test');
```


Invocando outra função do controller Test denominada `outher`
```php
$app->controller('Test@outher');
```

 





## <a id="models">Models</a>

Essa camada trabalha diretamente com as entidades lógicas da aplicação: usuário, cliente, produto, etc...
Tem como herança todas as funções e atributos de `App\Model\Model` que implementa a interface `App\Model\ModelInterface`.

```php
namespace App\Model;

interface ModelInterface {

	public function create();

	public function update();

    public function delete();
    
    //Inheritance from App\Model\Model
    public function save(array $data,array $validations=null);
    
    //Inheritance from App\Model\Model
    public function remove(array $validations=null);
    
    //Inheritance from App\Model\Model
    public static function find($id, $value);
    
    //Inheritance from App\Model\Model
	public static function all(array $paginate=null);

}
```



### Definindo um Model


#### Criando arquivos da Classe Model com o Maker
*  Via Browser url
```
/maker/file/model:<mode_da_classe>
```
> Para Ajuda
```
/maker
```

* Via CLI

No diretório raiz do projeto:
```
composer maker file model:<mode_da_classe>
```
> Para Ajuda
```
composer maker 
```

Os arquivos de classe Model são armazenados em `src/Models/`

#### Estrutura de um Model

```php
/**
 *  Test Model Class
 */
namespace App\Models;
use App\Model\Model;
use App\Database\DB;

class Test extends Model {
    //implicit public  $id, $created, $updated ;
    public $table = 'test' ; //table/migration name
    /* optional public/private att */
    private $name;

    /* optional code implementation */
    public function getName(){
        return $this->name;
    }

    /* optional code implementation */
    public function setName(string $name){
        $this->name = $name;
    }

	public function create (){
        /* optional code implementation here */

		$validations = [
			'name' => 'string|minlen:5|noexists:test',
			/* optional input validations */
		];
		return self::save( (array) $this , $validations);
	}

	public function update (){
        
        /* optional code implementation here */

		$validations = [
			'id' => 'int|exists:test',
			'name' => 'string|minlen:5|noexists:test',
			/* optional input validations */
		];
		return self::save( (array) $this , $validations);
	}

    /* abstract function */
	public function delete(array $validations=null){
    
        /* optional code implementation here */

        /* In remove() function, $validations = ['id' => 'int|mincount:1|exists:test] by default if this argument is null */
        parent::remove($validations);
	}

}
```

#### Model Validações | Array $validations 
Esta é uma maneira mais prática de implementar validações no seu crud utilizando `App::validate`.
Consiste em criar uma simples array podendo ser chamado como preferir, e em sua extrutura as chaves(keys) correspondem aos atributos que serão validados antes crud no banco de dados, e os valores as expressões regulares [do validate](#validator).

```php
$validations = [
	'id' => 'int|exists:<table_name>',
	'name' => 'string|minlen:5|noexists:<table_name>',
];
```

#### Usando um Model

Podemos utilizar em qualquer lugar na aplicação desde que importado, criando uma nova instância do objeto model em questão ou usando os metodos státicos.
Assumindo ter criado a o arquivo da class Model `Test`, vamos utiliza-lo com exemplo.


```php
use App\Models\Test;

$data = ['name' => 'Teste 1'];
$test = new Test($data);

//or

$test = new Test();
//public attribute
$test->name = 'Teste 1';
//with set function
$test->setName('Teste 1');
```


Model CRUD | Create, update e Delete

```php
//create
$test->create();
//update
$test->update();
//delete
$test->delete();
//returns an object(stdClass) { ["status"]=> bool ["msg"]=> string ["data"]=> array }
```

Model busca item e todos: `find`  e `all`

```php

//Find
$test = Test::find('id', 1);
// find by attribute id
$test = Test::find('name', 1);
// find by attribute name
// returns an object from App\Models\Test ou false

//All
$tests = Test::all(); 
//returns an array of objects App\Models\Test or false

```
[Para Mais funcões da Classe Model ](#app)
