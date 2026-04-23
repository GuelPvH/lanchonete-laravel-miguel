FROM php:8

COPY . .

WORKDIR /lanchonete

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

