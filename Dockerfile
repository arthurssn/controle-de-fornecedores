FROM php:8.2-fpm-alpine
RUN apk --no-cache add postgresql-dev
RUN docker-php-ext-install pdo pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
:
WORKDIR /var/www/html
COPY . /var/www/html/

RUN composer install
RUN composer dump-autoload
RUN php artisan key:generate
RUN php artisan config:clear
RUN php artisan route:cache

EXPOSE 8001
