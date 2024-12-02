## Dự án anplipe - chọn image  
FROM php:8.1-fpm-alpine as build 

WORKDIR /var/www/app

RUN curl -Ss https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . .

## run stage
FROM 
