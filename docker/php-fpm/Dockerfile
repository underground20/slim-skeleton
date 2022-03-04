FROM php:8.1-fpm-alpine

RUN apk update && apk add autoconf g++ make
RUN pecl install xdebug \
    && docker-php-ext-install pdo_mysql && docker-php-ext-enable xdebug

COPY ./www.conf /usr/local/etc/php-fpm.d

WORKDIR /var/www/app
