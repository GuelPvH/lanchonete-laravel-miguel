FROM php:8


WORKDIR /lanchonete

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY ../ .

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]