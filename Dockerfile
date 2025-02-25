FROM php:8.2-cli

# Instala pacotes necessários
RUN apt-get update && apt-get install -y git libzip-dev unzip mariadb-client

# Instala extensões PHP necessárias
RUN docker-php-ext-install zip pdo pdo_mysql

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configura o token de acesso globalmente no Git
ARG GIT_TOKEN
RUN git config --global url."https://$GIT_TOKEN@github.com".insteadOf "https://github.com"

# Define o diretório de trabalho
WORKDIR /preflex-api

# Copia os arquivos do projeto para o container
COPY . .

# Atualiza e inicializa os submódulos
RUN git submodule update --init --recursive

# Instala as dependências do Composer
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --no-interaction --no-progress --prefer-dist

# Ajusta as permissões para o diretório do projeto
#RUN chown -R www-data:www-data /preflex-api

# Inicia o servidor PHP embutido
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
