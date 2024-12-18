# Use PHP 8.2 FPM as a base image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    nodejs \
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . /var/www

# Set correct permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 777 /var/www/storage \
    && chmod -R 777 /var/www/bootstrap/cache

# Fix permissions for /tmp directory
RUN chmod -R 777 /tmp

#delete public/storage folder
RUN rm -rf /var/www/public/storage
# Expose port 9000 and start php-fpm server
EXPOSE 9000

# Command to run after container starts
CMD bash -c "php artisan migrate --force && \
    rm -rf /var/www/public/storage &&  \
    php artisan storage:link && \
    npm install && \
    npm run build && \
    php artisan optimize:clear && \
    php-fpm"
