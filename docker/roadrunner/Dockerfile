FROM composer:2.7.2 AS composer
FROM ghcr.io/roadrunner-server/roadrunner:2025.1.1 AS roadrunner

FROM php:8.4-cli-alpine

RUN apk add --no-cache \
    unzip \
    curl \
    git \
    linux-headers \
    && docker-php-ext-install sockets

COPY --from=composer /usr/bin/composer /usr/local/bin/composer
COPY --from=roadrunner /usr/bin/rr /usr/local/bin/rr

WORKDIR /var/www/app

RUN addgroup -g 1000 app && \
    adduser -D -u 1000 -G app app && \
    chown app:app /var/www/app

USER app

COPY --chown=app:app composer.json composer.lock ./

RUN composer install \
    --no-interaction \
    --no-dev \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

RUN ./vendor/bin/rr get-binary

COPY --chown=app:app . .

CMD ["sh", "-c", "./rr serve -c .rr.yaml"]
