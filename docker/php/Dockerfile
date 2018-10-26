FROM php:7.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zlib1g-dev \
    libxml2-dev \
    libmcrypt-dev

ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_NO_INTERACTION=1

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer --version \
    && composer global require hirak/prestissimo --no-suggest

RUN docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-install pdo_mysql opcache bcmath intl zip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

WORKDIR /var/www/app
