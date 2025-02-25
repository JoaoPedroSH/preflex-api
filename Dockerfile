# Use a imagem PHP oficial com CLI
FROM php:8.2-cli

# Atualiza e instala o git
RUN apt-get update && apt-get install -y git

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configura o token OAuth para acessar repositórios privados no GitHub
RUN composer config --global --auth github-oauth.github.com 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

# Define o diretório de trabalho e copia os arquivos para o contêiner
WORKDIR /preflex-api
COPY . .

# Instala as dependências do Composer, incluindo o módulo específico
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --no-interaction --no-progress --prefer-dist

# Expõe a porta 8080 para o servidor PHP embutido
EXPOSE 8080

# Comando para rodar o servidor PHP embutido na pasta public
CMD ["php", "-S", "localhost:8080", "-t", "public"]
