# MLV - Minha Loja Virtual - BACK-END

## Descrição

Sistema de e-commerce desenvolvido para uma loja poder vender seus produtos, que são obtidos através da API dos seus dois fornecedores, onde as compras serão salvas no banco de dados com os dados do cliente e do produto.

## Ferramentas

-   [VS Code](https://code.visualstudio.com/download): Ferramenta de edição de código.
-   [Git](https://git-scm.com/doc): Ferramenta de versionamento de código.
-   [PHP 8.1.10](https://www.php.net/downloads.php).
-   [Composer 2.5.3](https://getcomposer.org/download/): Gerenciador de dependências para projetos em PHP
-   [Laravel 10](https://laravel.com/docs/10.x): Framework de desenvolvimento fullstack, aqui utilizado para o back-end, em PHP.
-   [MongoDB Community](https://www.mongodb.com/try/download/community): Sistema de banco de dados do tipo NoSQL.
-   [Insomnia](https://insomnia.rest/download): Software para realizar requisições HTTP para APIs.

## Instalações

-   **Visual Studio Code**

    -   Baixe e instale o [VS Code](https://code.visualstudio.com/download/).

-   **PHP**

    -   Baixe o [PHP 8.1.10](https://www.php.net/downloads.php). Descompacte a pasta em C:/ .
    -   Acesse Editar variáveis de Ambiente do Sistema, vá na aba Avançado, em Variáveis de Ambiente.
    -   Em Variáveis do Sistema, clique em **Path** e depois clique em editar.
    -   Clique em Procurar, vá até a pasta do PHP que vc descompactou, selecione-a e clique Ok.
    -   Clique em Ok nas demais janelas que abriram.
    -   Abra o terminal e execute **php -v** para certificar que instalou corretamente.

-   **MongoDB Community**

    -   Baixe e instale o [MongoDB Community](https://www.mongodb.com/try/download/community).

-   **Insomnia**

    -   Baixe e instale o [Insomnia](https://insomnia.rest/download).

-   **Git**

    -   Baixe e instale o [Git](https://git-scm.com/doc).
    -   Prossiga com a instalação até concluir.

-   **Composer**

    -   Baixe e execute o [Composer](https://getcomposer.org/). Instale no modo **desenvolvedor**.
    -   Na etapa de selecionar o PHP, navege até a pasta do **PHP** instalado em sua máquina e selecione o arquivo **php.exe**.
    -   Prossiga com a instalação padrão até concluir.

-   **Laravel**

    -   Abra o **Git Bash** ou o **VS Code** e execute comando **composer global require laravel/installer** para instalar o laravel globalmente.

## Executando o projeto

-   **Preparando o banco de dados**

-   **Clonando o projeto**

    -   Copie a url do reposiyório, abra o **Git Bash** ou o **VS Code** na pasta **www**, dentro da pasta do **laragon**.
    -   Execute o comando **git clone <url-do-repositório>**
    -   Navegue até a pasta do projeto e rode **composer install** para gerar a pasta vendor

-   **Iniciando o projeto**

    -   Copie o arquivo **.env.example** e renomeie a cópia para **.env**
    -   No **.env** altere as propriedades do banco conforme o seu banco local
    -   Execute o comando **php artisan serve** para iniciar o servidor

## Desenvolvimento

-   **Criação do projeto**

    -   Para criar um novo projeto no laravel, naveguei até a pasta **laragon/www** usei o comando **laravel new mlv-backend-laravel**
    -   Fui até a pasta **mlv-backend-laravel** e executei o **VS Code**.
    -   Utilizei o comando **git init** para iniciar o versionador git.
    -   Criei o arquivo **readme.md**, descrevi passos do projeto e salvei.
    -   Para verificar se o projeto foi criado corretamente, executei **php artisan serve** na pasta do projeto.
    -   Após ele iniciar, acessei <http://localhost:8000> no browser e abriu a tela de boas vindas do **Laravel**.
    -   Para versionar usei os recursos da extensão **Git Extension Pack** no próprio VS Code.

---
