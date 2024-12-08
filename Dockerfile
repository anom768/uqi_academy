# Gunakan gambar PHP dengan Apache
FROM php:8.2-apache

# Aktifkan modul Apache Rewrite (jika diperlukan)
RUN a2enmod rewrite

# Install Composer dan ekstensi PHP yang diperlukan
RUN apt-get update && apt-get install -y \
    unzip libzip-dev libicu-dev \
    && docker-php-ext-install intl zip \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Salin file proyek ke dalam container
WORKDIR /var/www/html
COPY . .

# Install dependency Composer
RUN composer install --no-dev --optimize-autoloader

# Pastikan hak akses benar
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Ekspos port 80 untuk Apache
EXPOSE 8080

# Perintah untuk menjalankan server
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
