# MLV - Minha Loja Virtual - BACK-END

## Escopo

Sistema de e-commerce desenvolvido para uma loja poder vender seus produtos, que são obtidos através da API dos seus dois fornecedores, onde as compras serão salvas no banco de dados com os dados do cliente e do produto.

## Solução proposta

Para resolver o problema foram definidas as seguintes regras:

-   **Produtos**
    -   Serão obtidos dinamicamente pelas APIs dos fornecedores.
    -   Estarão em exibição na tela e poderão ser filtrados por categoria, nome, etc.
    -   Quando feita a compra, é criado o item de produto com os dados do produto no ato da compra.
    -   Os itens são criados para previnir que possíveis alterações futuras no produto impactem nos valores do mesmo no ato da compra realizada anteriormente.
-   **Compras**
    -   A compra só é concretizada após o cliente clicar em comprar e confirmar.
    -   Deve haver itens no carrinho para poder concretizar a compra.
    -   A compra possuirá os dados do cliente e dos itens da compra.
    -   Ambos item e compra ficam salvos no banco de dados
-   **Carrinho**
    -   Os dados do carrinho ficam armazenados nos cookies.
    -   Após concluída a compra, o carrinho deve ser esvaziado.
-   **Usuário - Cliente**

    -   Só poderá realizar a compra com cadastro.
    -   Pode alterar apenas os próprios dados, exceto o perfil.
    -   Pode logar e deslogar do sistema.

-   **Usuário - Admin**
    -   Pode alterar os próprios dados e dados dos clientes.
    -   Pode ver e alterar as compras realizadas.
    -   Pode logar e deslogar do sistema.
-   **Mais informações**
    -   Usuários sem cadastro podem navegar pelo sistema livremente e adicionar produtos ao carrinho.
    -   É necessário possuir cadastro para concretizar a compra.
    -   O sistema possui dois tipos de usuário: admin e cliente. Padrão de criação: cliente.
    -   Não foi implementado sistema de pagamento.

## Ferramentas

-   [VS Code](https://code.visualstudio.com/download): Ferramenta de edição de código.
-   [Git](https://git-scm.com/doc): Ferramenta de versionamento de código.
-   [Laragon Full](https://laragon.org/download/index.html): Ambiente de desenvolvimento e servidor local. Nele já vem inclusos o [PHP 8.1.10](https://www.php.net/downloads.php), [Apache 2.4.54](https://httpd.apache.org/download.cgi), [MySQL 8.0.30](https://www.mysql.com/downloads/) e [NodeJs 18.15](https://nodejs.org/en/);
-   [Composer 2.5.3](https://getcomposer.org/download/): Gerenciador de dependências para projetos em PHP
-   [Laravel 10](https://laravel.com/docs/10.x): Framework de desenvolvimento fullstack, aqui utilizado para o back-end, em PHP.
-   [Insomnia](https://insomnia.rest/download): Software para realizar requisições HTTP para APIs.

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

## Executando o projeto

-   **Preparando o banco de dados**

    -   Abra o banco de dados do Laragon, acesse o host 127.0.0.1, porta 3306, insira o username e a senha pra entrar.
    -   Crie um banco de dados chamado **mvl_laravel** com collection sendo **utf8mb4_unicode_ci**

-   **Clonando o projeto**

    -   Copie a url do reposiyório, abra o **Git Bash** ou o **VS Code** na pasta **www**, dentro da pasta do **laragon**.
    -   Execute o comando **git clone <url-do-repositório>**
    -   Navegue até a pasta do projeto e rode **composer install** para gerar a pasta vendor

-   **Iniciando o projeto**

    -   Copie o arquivo **.env.example** e renomeie a cópia para **.env**
    -   No **.env** altere as propriedades do banco conforme o seu banco local
    -   Execute o comando **php artisan migrate** para gerar as migrations
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
    -

-   **Implementando autenticação com Sanctum**

    -   Ele já vem instalado no laravel 10, então parti pra configuração das rotas e controller.
    -   Criei a LoginController com os métodos **login** e **logout**.
    -   Defini as rotas de login e logout em **routes/api**.

-   **Models e migrations**

    -   As models definidas foram User(usuário), Product(produto), ItemProduct(item) e Purchase(compra).
    -   Usei a mesma model e migration de User já nativa do laravel, apenas adicionando mais campos
    -   Geração das models com migrations usando o comando **php artisan make:model NomeModel -m**.
    -   Um usuário pode ser cliente de várias compras e uma compra pode ter vários itens de produto.

-   **Controllers**

    -   As controllers definidas foram Auth(autenticação), Client(cliente), User(usuário), Product(produto) e Purchase(compra).
    -   A controller de Cliente possui apenas as ações de criar, editar e exibir. Seu propósito é a alteração própria de dados do usuário logado
    -   A controller de Produto consiste nas consultas as APIs fornecidas.
    -   Uma controller invokable foi criada para obter as compras a partir do id do usuário
    -   As demais controllers são de CRUD.
    -   Foram criados **requests** específicos para os métodos **store** e **update** dos CRUDs.

-   **Rotas**
    -   As rotas foram definidas em **routes/api.php** seguindo padrão RESTful.
    -   Foi criada uma **middleware** para validação se o usuário é **admin** ou não.
    -   A middleware **admin** foi utilizada em algumas rotas para previnir de o usuário acessar dados indevidos.
    -   Rodei **php artisan route:list** para checagem das rotas.

---
