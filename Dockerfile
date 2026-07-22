FROM php:8.4-fpm-alpine AS php

# 必要なOSの部品をインストール
RUN apk add -U --no-cache \
    curl-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    $PHPIZE_DEPS

# GDの設定（パスを明示）をしてから、curl, exif, gd をインストール
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install curl exif gd

# APCuをインストールして、最後にビルドツールをお掃除
RUN pecl install apcu \
    && docker-php-ext-enable apcu \
    && apk del $PHPIZE_DEPS

FROM php:8.4-fpm-alpine AS php

RUN docker-php-ext-install pdo_mysql

RUN install -o www-data -g www-data -d /var/www/upload/image/
