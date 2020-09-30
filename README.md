ProjetoExemploCodeigniter3
==========================

Página web para calcular o valor da ligação de acordo com o plano selecionado.

 - Para realizar o bakend projeto foi utilizado o Framework CodeIgniter seguindo 
 os padrões MVC, no frontend apenas JS e CSS com Jquery.

 - A linguagem utilizada para a manipulação do banco de dados foi SQL,
 as instruções para a execução do mesmo estarão abaixo.

## Executando o Projeto

 - Primeiramente execute:

```bash
composer install
```
 - Na raiz do projeto é possivel encontrar a pasta DB, nela contên o arquivo
 telzir_master.sql contêndo o sql do banco de dados, no projeto foi utilizado
 este nome telzir_master para o banco de dados, certifique-se que antes de 
 importar o arquivo .sql o banco já esteja criado.

 - Após a criação do banco apenas altere as configurações para a conexão com o banco de dados
 que fica dentro de /application/config/database.php.

 - Para executar a aplicação existe um arquivo Makefile que executará o projeto em
https://localhost:8080, para executar o arquivo apenas execute no terminal:

```bash
make
```
 - Caso queria executar com o composer apenas execute no terminal:

```bash
composer run-script start
```

- Ou se prefirir apenas coloque o projeto dentro do servidor e mude o caminho da aplicação em
base_url dentro de /application/config/config.php

```php
$config['base_url'] = 'Caminho do projeto no servidor';
```

## Executando os Testes

 - Para a construção dos testes foi utilizado o Framework PHPUnit, para executá-lo
 execute na raiz do projeto no terminal:

```bash
composer run-script test
```

Ou

```bash
vendor/bin/phpunit --testdox
```

Obs: Para não interfirir na integridade dos registros do banco de dados e interferir nos
testes da aplicação em si, os testes dos Models onde contêm atualização estão atualizando
os registros já existentes com os mesmos valores, e os testes de delete estão tentando deletar
registros inexistentes por default, caso necessário apenas altere para excluir um registro que exista no banco de dados.







