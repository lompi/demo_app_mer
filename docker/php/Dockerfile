FROM php:8.1-fpm-alpine

# composer
RUN apk update && apk add git unzip && curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# pdo_mysql
RUN docker-php-ext-install -j$(nproc) pdo_mysql
