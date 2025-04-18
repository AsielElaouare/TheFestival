FROM php:fpm

RUN apt-get update -y && apt-get install -y zlib1g-dev libpng-dev libfreetype6-dev
RUN docker-php-ext-configure gd --enable-gd --with-freetype
RUN docker-php-ext-install gd
RUN docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer



# RUN pecl install xdebug && docker-php-ext-enable xdebug