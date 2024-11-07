# Sử dụng image PHP 8.x chính thức với Apache đã cài sẵn
FROM php:8.1-apache

# Cài đặt các extension PHP cần thiết cho Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Thiết lập thư mục làm việc cho ứng dụng
WORKDIR /var/www/html

# Copy toàn bộ mã nguồn ứng dụng Laravel vào container
COPY . .

# Chỉnh quyền cho các thư mục storage và bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Kích hoạt module rewrite của Apache cho Laravel
RUN a2enmod rewrite

# Expose cổng 80 (mặc định của Apache)
EXPOSE 80

# Khởi động Apache khi container khởi động
CMD ["apache2-foreground"]
