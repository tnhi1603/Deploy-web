FROM php:8.1-fpm-alpine

WORKDIR /var/www/html

# Install PHP extensions
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions mbstring pdo_mysql zip exif pcntl gd memcached

# Install system dependencies
RUN apk add --no-cache \
    build-base \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    unzip \
    git \
    curl \
    zlib-dev \
    libmemcached-dev \
    nginx \
    nano \
    supervisor

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Create non-root user
RUN addgroup -g 1000 www && adduser -u 1000 -G www -s /bin/bash -D www

# Copy application code
COPY --chown=www:www-data . /var/www

# Set permissions
RUN chmod -R ug+w /var/www/storage /var/www/bootstrap/cache

# Supervisor and custom configurations
COPY docker/supervisor.conf /etc/supervisord.conf
COPY docker/php.ini /usr/local/etc/php/conf.d/app.ini
COPY docker/nginx.conf /etc/nginx/sites-enabled/default

# Logging setup
RUN mkdir -p /var/log/php && touch /var/log/php/errors.log && chmod 777 /var/log/php/errors.log

# Production environment setup
COPY docker/.env.production .env

# Install Composer dependencies
RUN composer install --ignore-platform-reqs --optimize-autoloader --no-dev

# Entrypoint script
RUN chmod +x /var/www/docker/run.sh

# Expose PHP-FPM port
EXPOSE 9000

ENTRYPOINT ["/var/www/docker/run.sh"]
