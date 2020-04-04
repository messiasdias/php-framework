![Thumbnail of Cayman](../assets/public/img/default/md-logo2.png)

# MD PHP Framework

*Mini Framework para desenvolvimento de App/Api com Back-End PHP e Banco de Dados Mysql.
Front-End com PHP Twig Templete engine e/ou Vuejs, com HTML, CSS/Sass.*





## Get Started

### Iniciando um projeto
* [Composer](https://getcomposer.org/download/) 
```
composer create-project -s dev messiasdias/md-php-framework-project
```
* [Git](https://github.com/messiasdias/md-php-framework-project)
```
git clone https://github.com/messiasdias/md-php-framework-project.git <nome_do_diretorio_opcional>
```




### Preparando o Servidor
Primeiramente devemos ativar o ***modulo Rewrite*** nosso Servidor Web, nesse exemplo utilizamos o Apache2 no Ubuntu Server, Debian e derivados.

Para ativar no Linux o comando é:
```
 sudo a2enmod rewrite
 sudo service apache2 reload
```

Apartir do diretório do projeto criado acima, Se não existir, crie os seguintes arquivos:

* /public/.htaccess  e/ou 
* /api/.htaccess (opcional)

com o conteúdo abaixo:

```
RewriteEngine On
RewriteCond %{SCRIPT_FILENAME} !-f
RewriteCond %{SCRIPT_FILENAME} !-d
RewriteRule ^(.*)$ index.php
Options All -Indexes
```


Ainda no diretório do projeto , Se não existir, crie os seguintes arquivos:

*  /public/index.php  e/ou
*  /api/index.php (opcional)

```
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


### Configurando Projeto com Composer ( PHP )
```
composer install
```


### Configurando Projeto com NPM ( JavaScript )
```
npm install
```

* Iniciando servidor de Desenvolvimento
```
npm run dev 
```
ou 

```
npm run serve
```

* Construindo versão de Produção
```
npm run build
```


## Definindo as Rotas

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









- **Views**

Variaveis Default:

> {{url}} => URL Atual;

> {{user.att}} | false, => Dados do Usuário Logado ou false;

> {{token}} | false => Token gerado acara requisição ou false;

> {{input.name}}' => Valores dos inputs anteriormente enviados via formulário html, se não existe, a váriavél não existirá.

> {{assets}} => '/assets' => Path default root de /img, /css, /js, etc;

> {{log.msg | classe }} | false => Messagens de Aviso para o usuário com as classes: success, error e warning;

> {{session.name}} | false => $_SESSION padrão do php;

>	{{cookies.name}}  |false => Cookies Vindos da Classe Request