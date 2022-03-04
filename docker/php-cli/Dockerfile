FROM php:8.1-cli-alpine

RUN apk update && apk add unzip

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

RUN docker-php-ext-install pdo_mysql

COPY ./conf.d /usr/local/etc/php/conf.d

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet

WORKDIR /var/www/app
