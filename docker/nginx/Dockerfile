ARG NGINX_IMAGE_VERSION
FROM nginx:${NGINX_IMAGE_VERSION}-alpine

COPY ./conf.d /etc/nginx/conf.d

WORKDIR /var/www/app
