# Gunakan image PHP resmi dengan Apache
FROM php:8.1-apache

# Install ekstensi PHP yang diperlukan untuk Composer
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo_mysql mbstring

# Set working directory
WORKDIR /app

# Salin semua file ke dalam container
COPY composer.json .

RUN composer install --no-scripts

COPY . .

# Set working directory
WORKDIR /app/public

CMD php -S 0.0.0.0:8080