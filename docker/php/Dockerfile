FROM php:7.1-apache

RUN apt-get update && apt-get install -y git zip unzip

COPY php.ini /usr/local/etc/php/

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
   php composer-setup.php && \
   mv composer.phar /usr/local/bin/composer && \
   php -r "unlink('composer-setup.php');"

RUN docker-php-ext-install pdo pdo_mysql

RUN pecl install xdebug-2.6.0 && \
    docker-php-ext-enable xdebug

WORKDIR /var/www/html/
