FROM php:8.1-fpm-alpine

RUN apk update && apk add autoconf g++ make
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN apk add libpq-dev \
    && docker-php-ext-configure pgsql --with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo_pgsql

COPY ./www.conf /usr/local/etc/php-fpm.d

WORKDIR /var/www/app
