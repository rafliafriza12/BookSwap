# Dockerfile

FROM php:8.2-apache

# Install dependencies
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

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY project/ .

# Copy composer.json and composer.lock
COPY project/composer.json project/composer.lock ./

# Log isi direktori untuk debugging
RUN ls -la /var/www/html
RUN cat /var/www/html/composer.json
RUN cat /var/www/html/composer.lock

# Install dependencies PHP dengan Composer
RUN composer install --no-dev --optimize-autoloader

# Install dependencies Node.js dengan npm untuk Tailwind
RUN npm install

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
