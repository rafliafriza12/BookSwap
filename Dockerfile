# Gunakan image PHP dengan Apache
FROM php:8.2-apache

# Set working directory di dalam container
WORKDIR /var/www/html

# Install dependencies sistem yang diperlukan oleh Laravel
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    nodejs \
    npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Copy file composer.json, composer.lock, dan package.json ke container
COPY composer.json composer.lock ./
COPY package.json package-lock.json ./

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install dependencies PHP dengan Composer
RUN composer install --no-dev --optimize-autoloader

# Install dependencies Node.js dengan npm untuk Tailwind
RUN npm install

# Copy seluruh file Laravel dari root folder proyek ke dalam container
COPY . .

# Build Tailwind CSS
RUN npm run build

# Atur permissions untuk folder storage dan bootstrap/cache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Expose port 8000 untuk web server
EXPOSE 8000

# Jalankan Apache
CMD ["apache2-foreground"]
