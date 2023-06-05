FROM php:8-fpm-bullseye
RUN pecl install xdebug-3.2.0 \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install pdo_mysql mysqli
WORKDIR /var/www/html/public
CMD [ "php-fpm" ]