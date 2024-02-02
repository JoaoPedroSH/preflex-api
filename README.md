# tasks-manager-api

### Instalar dependencias
```sh
composer install
```
 
### Gerar esquema de banco de dados
```sh
php config/bin/doctrine orm:schema-tool:create
```
### Atualizar esquema de banco de dados
```sh
php config/bin/doctrine orm:schema-tool:drop --force
php config/bin/doctrine orm:schema-tool:create
```
ou
```sh
php config/bin/doctrine orm:schema-tool:update --force
```
ou
```sh
php config/bin/doctrine orm:schema-tool:update --force --dump-sql
```
### Start server
```sh
php -S localhost:8080 -t public
```

# Documentations
Slim - ['https://www.slimframework.com/docs/v4/']
Doctrine - ['https://www.doctrine-project.org/projects/doctrine-orm/en/current/tutorials/getting-started.html']

