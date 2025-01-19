
FROM php:8.3.12-apache

RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    libpq-dev \
    && docker-php-ext-install zip pdo pdo_mysql pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN a2enmod rewrite

COPY . /var/www/html

WORKDIR /var/www/html

EXPOSE 80

COPY /apache/vhost.conf /etc/apache2/sites-available/000-default.conf

CMD ["apache2-foreground"]