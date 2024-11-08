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

# Salin semua file proyek Laravel ke dalam Docker container
COPY . .

# Salin file .env.example sebagai .env jika .env belum ada
RUN cp .env.example .env

# Gantikan settingan environment variable agar dapat diatur dari luar container (seperti Railway)
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV APP_KEY=base64:PV1Qs3ZTBrO8aA6HXJSLBEPMKxfQNfOWIva00KiMZbY= 
ENV APP_URL=mysql://root:NcsuZdbHVeXGOymzgxMcTkQhCTytUTeY@mysql.railway.internal:3306/railway

# Variabel untuk database
ENV DB_CONNECTION=mysql
ENV DB_HOST=autorack.proxy.rlwy.net
ENV DB_PORT=44195
ENV DB_DATABASE=railway
ENV DB_USERNAME=root
ENV DB_PASSWORD=enWIUwufsWxzPIDaGDdVNAJfQtLNSkUo




# Bersihkan cache Laravel
RUN php artisan config:clear || true
RUN php artisan cache:clear || true
RUN php artisan route:clear || true
RUN php artisan view:clear || true

# Install dependencies menggunakan Composer
RUN composer install --no-dev --optimize-autoloader

# Set permissions untuk direktori Laravel
RUN chown -R www-data:www-data /var/www
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Generate Laravel app key jika diperlukan
RUN php artisan key:generate || true

# Cache konfigurasi, route dan view untuk optimasi
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Expose port 8080
EXPOSE 8080

# Jalankan Laravel menggunakan artisan serve (untuk development purposes)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
