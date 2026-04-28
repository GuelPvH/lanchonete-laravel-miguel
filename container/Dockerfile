FROM node:20 AS build

WORKDIR /lanchonete

COPY package*.json ./

RUN npm init -y

RUN npm install

RUN npm ci --omit=dev

COPY . .

RUN npm run build || cat /root/.npm/_logs/*
#-------------------------------------------------------------------
FROM php:8


WORKDIR /lanchonete

RUN apt-get update
RUN apt-get install npm git unzip curl libzip-dev zip -y 
RUN docker-php-ext-install pdo pdo_mysql zip


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader

COPY --from=build /lanchonete/public/build ./public/build

RUN chown -R www-data:www-data /lanchonete \
    && chmod -R 775 storage bootstrap/cache

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

