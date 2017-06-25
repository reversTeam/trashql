FROM php:7.1.5-fpm

RUN usermod -u 1000 www-data
RUN apt-get update
RUN apt-get install -y git libpq-dev unzip
RUN curl -lsS https://getcomposer.org/composer.phar -o /usr/local/bin/composer
RUN chmod a+x /usr/local/bin/composer
RUN pecl install xdebug
RUN docker-php-ext-install -j$(nproc) pdo pdo_pgsql pcntl
RUN docker-php-ext-enable xdebug
RUN docker-php-ext-enable opcache
RUN docker-php-ext-enable pcntl

RUN mkdir /var/www/.composer && chown -R 1000 /var/www/.composer

