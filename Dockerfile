FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git zip unzip curl libzip-dev libpq-dev libonig-dev \
    && docker-php-ext-install pdo_mysql zip mbstring

WORKDIR /var/www

COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build || true

CMD php artisan serve --host=0.0.0.0 --port=8080
