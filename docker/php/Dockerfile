# Dockerfile
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    libzip-dev  # Add libzip-dev to install PHP zip extension

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip  # Add 'zip' extension

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy existing application directory contents
COPY . /var/www/html

# Install application dependencies
RUN composer install
RUN npm install

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage

# COPY ./docker/php/init.sh /usr/local/bin/init.sh
# RUN chmod +x /usr/local/bin/init.sh

# # Set the init.sh script as the entrypoint
# ENTRYPOINT ["/usr/local/bin/init.sh"]

EXPOSE 8000

# Start PHP built-in server
CMD php artisan serve --host=0.0.0.0 --port=8000
