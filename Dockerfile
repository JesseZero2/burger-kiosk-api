FROM php:8.4-cli

RUN apt-get update && apt-get install -y git unzip libpq-dev libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

COPY . .

RUN composer dump-autoload --optimize \
    && php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
