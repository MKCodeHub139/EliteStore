FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git unzip curl libpq-dev libzip-dev zip

# Proper Node install
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

RUN docker-php-ext-install pdo pdo_pgsql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

# PHP deps
RUN composer install --no-dev --optimize-autoloader

# Frontend build
RUN npm install
RUN npm run build

EXPOSE 10000

CMD php artisan migrate --force || true && php artisan serve --host=0.0.0.0 --port=10000