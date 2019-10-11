## JOGO DA FORCA

> Jogo da Forca - Ulbra 2019/2 ENG SW II


### Tecnologias utilizadas: 
- HTML5
- CSS3
- Bootstrap
- JavaScript
- JQuery

#### Requisitos
- PHP 7.2 +
- MySQL 5.7 +

#### Banco de Dados
- MySQL

### Instalação

#### Banco de Dados
- Pré requisito: criar o banco de dados MySQL
- Pré requisito: configurar os dados no arquivo `.env`
    -- DB_DATABASE=forca  // NOME DO BANCO DE DADOS
    -- DB_USERNAME=root   // USUARIO DO BANCO DE DADOS
    -- DB_PASSWORD=123456 // SENHA DO BABNCO DE DADOS

#### Rodar Aplicação
- Abrir o Console(Prompt de Comando do Windows ou Linux)
- Digitar os comandos abaixo:
- php artisan migrate
- php artisan db:seed
- php artisan serve
- Abrir no navegador http://127.0.0.1:8000