FROM php:7.4-fpm-alpine

ADD docker/php/php.ini /usr/local/etc/php

RUN apk add --no-cache mysql-client msmtp perl wget procps shadow libzip libpng libjpeg-turbo libwebp freetype icu icu-libs icu-dev
RUN apk add --no-cache bash
RUN set -ex && apk --no-cache add libxml2-dev

RUN apk add --no-cache icu-dev icu-libs zlib-dev g++ make automake autoconf libzip-dev
RUN apk add --no-cache libpng-dev libwebp-dev libjpeg-turbo-dev freetype-dev libxslt-dev
RUN docker-php-ext-install soap
RUN docker-php-ext-install bcmath
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp
RUN docker-php-ext-install gd
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install intl
RUN docker-php-ext-install opcache
RUN docker-php-ext-install exif
RUN docker-php-ext-install zip
RUN docker-php-ext-install xsl

RUN apk add --no-cache linux-headers
RUN docker-php-ext-install sockets

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN wget https://getcomposer.org/composer-stable.phar -O /usr/local/bin/composer && chmod +x /usr/local/bin/composer

WORKDIR /var/www/html
