ARG PHP_IMAGE_VERSION
FROM php:${PHP_IMAGE_VERSION}-fpm-alpine

ARG XDEBUG_VERSION

RUN apk update && apk add unzip autoconf g++ make libpq-dev \
    && apk add --update linux-headers \
    && pecl install xdebug-$XDEBUG_VERSION \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-enable xdebug

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

COPY ./conf.d /usr/local/etc/php/conf.d
COPY www.conf /usr/local/etc/php-fpm.d/

WORKDIR /var/www/app
