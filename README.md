# MLV - Minha Loja Virtual - BACK-END

## Descrição

Sistema de e-commerce desenvolvido para uma loja poder vender seus produtos, que são obtidos através da API dos seus dois fornecedores, onde as compras serão salvas no banco de dados com os dados do cliente e do produto.

## Ferramentas

-   [VS Code](https://code.visualstudio.com/download): Ferramenta de edição de código.
-   [Git](https://git-scm.com/doc): Ferramenta de versionamento de código.
-   [Laragon Full](https://laragon.org/download/index.html): Ambiente de desenvolvimento e servidor local. Nele já vem inclusos o [PHP 8.1.10](https://www.php.net/downloads.php), [Apache 2.4.54](https://httpd.apache.org/download.cgi), [MySQL 8.0.30](https://www.mysql.com/downloads/) e [NodeJs 18.15](https://nodejs.org/en/);
-   [Composer 2.5.3](https://getcomposer.org/download/): Gerenciador de dependências para projetos em PHP
-   [Laravel 10](https://laravel.com/docs/10.x): Framework de desenvolvimento fullstack, aqui utilizado para o back-end, em PHP.
-   [React 18.11](https://react.dev/learn): Framework de desenvolvimento front-end em Javascript/Typescript.

## Instalações

-   **Visual Studio Code**

    -   Baixe e instale o [VS Code](https://code.visualstudio.com/download/).
    -   Prossiga com a instalação até concluir.

-   **Git**

    -   Baixe e instale o [Git](https://git-scm.com/doc).
    -   Prossiga com a instalação até concluir.

-   **Laragon**

    -   Baixe e instale o [Laragon](https://laragon.org/). Ele já vem por padrão com PHP, Apache, Node.JS.
    -   Após a instalação, execute o **Laragon** e clique em **Iniciar Todos** para iniciar o **Apache** e o **MySQL**.
    -   Acesse <http://localhost> no navegador. Se estiver tudo correto, deverá aparecer a tela de boas-vindas do **Laragon**.

-   **Composer**

    -   Baixe e execute o [Composer](https://getcomposer.org/). Instale no modo **desenvolvedor**.
    -   Na etapa de selecionar o PHP, navege até a pasta do **laragon**, navegue até bin/php, abra a pasta da versão do PHP e selecione o arquivo **php.exe**.
    -   Prossiga com a instalação padrão até concluir.
    -   Teste se instalou abrindo o terminal do **Laragon** e digitando o comando _composer_.

-   **Laravel**
    -   Abra o **Git Bash** ou o **VS Code** na pasta **www**, dentro da pasta do **laragon**.
    -   Rode o comando **composer global require laravel/installer** para instalar o laravel globalmente.

## Desenvolvimento

-   **Criação do projeto**

    -   Para criar um novo projeto no laravel, naveguei até a pasta **laragon/www** usei o comando **laravel new mlv-backend-laravel**
    -   Fui até a pasta **mlv-backend-laravel** e executei o **VS Code**.
    -   Utilizei o comando **git init** para iniciar o versionador git.
    -   Criei o arquivo **readme.md**, descrevi passos do projeto e salvei.
    -   Para verificar se o projeto foi criado corretamente, executei **php artisan serve** na pasta do projeto.
    -   Após ele iniciar, acessei <http://localhost:8000> no browser e abriu a tela de boas vindas do **Laravel**.
    -   Para versionar usei a extensão do Git no próprio VS Code.

---
