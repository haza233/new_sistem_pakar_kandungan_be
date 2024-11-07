# Menggunakan PHP versi 8.1 FPM
FROM php:8.1-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear apt cache untuk mengurangi ukuran image
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions yang diperlukan oleh Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Salin Composer dari image official Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Salin file aplikasi Laravel
COPY . .

# Install dependencies menggunakan Composer
RUN composer install --no-dev --optimize-autoloader

# Set permissions untuk direktori Laravel
RUN chown -R www-data:www-data /var/www

# Pastikan .env ada dan sudah disesuaikan
# COPY .env.example .env

# Generate Laravel app key jika diperlukan
RUN php artisan key:generate

# Cache konfigurasi, route dan view untuk optimasi
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Expose port 8080
EXPOSE 8080

# Jalankan Laravel menggunakan artisan serve (untuk development purposes)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
