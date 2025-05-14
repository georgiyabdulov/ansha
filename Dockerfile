FROM php:8.2.12-apache

# Install required extensions
RUN apt-get update && apt-get install -y \
    libzip-dev unzip && \
    docker-php-ext-install zip pdo pdo_mysql mysqli

# Install Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Apache rewrite (optional)
RUN a2enmod rewrite

# Xdebug config
COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
