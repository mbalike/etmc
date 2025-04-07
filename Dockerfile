FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    nodejs \
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy composer files first for better caching
COPY composer.json composer.lock ./

# Set memory limit for composer
ENV COMPOSER_MEMORY_LIMIT=-1

# Install dependencies
RUN composer install --no-scripts --no-autoloader --no-dev

# Copy the rest of the application
COPY . .

# Run composer scripts and generate autoloader
RUN composer dump-autoloader --optimize --no-dev

# Install and build frontend assets if they exist
RUN if [ -f "package.json" ]; then npm install && npm run build; fi

# Generate application key
RUN if [ -f ".env" ]; then php artisan key:generate; fi

# Set permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000