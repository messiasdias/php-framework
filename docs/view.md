# Views




### Variaveis Default

> {{url}} => URL Atual;

> {{user.att}} | false, => Dados do Usuário Logado ou false;

> {{token}} | false => Token gerado acara requisição ou false;

> {{input.name}}' => Valores dos inputs anteriormente enviados via formulário html, se não existe, a váriavél não existirá.

> {{assets}} => '/assets' => Path default root de /img, /css, /js, etc;

> {{log.msg | classe }} | false => Messagens de Aviso para o usuário com as classes: success, error e warning;

> {{session.name}} | false => $_SESSION padrão do php;

>	{{cookies.name}}  |false => Cookies Vindos da Classe Request