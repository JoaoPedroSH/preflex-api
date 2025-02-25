FROM php:8.2-cli

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia os arquivos do projeto para o container
WORKDIR /preflex-api
COPY . .

# Garante que os submódulos são clonados corretamente
RUN git submodule update --init --recursive

# Instala as dependências do Composer
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --no-interaction --no-progress --prefer-dist

CMD ["php", "-S", "127.0.0.1:8080", "-t", "public"]
