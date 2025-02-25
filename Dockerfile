FROM php:8.2-cli

# Instala o Git e dependências necessárias, incluindo o zip
RUN apt-get update && apt-get install -y git libzip-dev unzip

# Instala a extensão ZIP do PHP
RUN docker-php-ext-install zip

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho
WORKDIR /preflex-api

# Copia os arquivos do projeto para o container
COPY . .

# Atualiza e inicializa os submódulos
RUN git submodule update --init --recursive

# Instala as dependências do Composer
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --no-interaction --no-progress --prefer-dist

# Inicia o servidor PHP embutido
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
