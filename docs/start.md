## Iniciando um Projeto

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

### /public
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

### /
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


## Config - Definindo Configurações
### /config

Dentro de /config estão os arquivos referentes as configurações app, key, banco de dados e middlewares.
Ao iniciar um projeto, arquivos de exemplo são disponibilizados para cado um dos arquivos exigidos.
