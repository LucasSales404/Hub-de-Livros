FROM php:8.3-cli

# Instalar extensões necessárias
RUN apt-get update && apt-get install -y \
    zip unzip curl git libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql zip

# Instalar o Composer (copiando da imagem oficial do Composer)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
