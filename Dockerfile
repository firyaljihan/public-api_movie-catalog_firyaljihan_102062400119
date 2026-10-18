FROM php:8.2-fpm-alpine

# Install ekstensi pendukung database (MySQL)
RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www

COPY . .

EXPOSE 9000

CMD ["php-fpm"]
