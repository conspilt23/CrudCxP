# Dockerfile
# Stage 1: Build
FROM composer:2.7.2 as build

WORKDIR /app

COPY . /app

RUN composer install

# Stage 2: Production
FROM php:8.0-fpm

WORKDIR /var/www

# Install extensions
RUN apt-get update && apt-get install -y \
    apt-utils \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    && docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-freetype=/usr/include/ \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl gd

# Copy built source from the previous stage
COPY --from=build /app /var/www

# Copy the wait-for-mysql script
COPY wait-for-mysql.sh /usr/local/bin/wait-for-mysql
RUN chmod +x /usr/local/bin/wait-for-mysql

# Copy the start script
COPY start.sh /usr/local/bin/start
RUN chmod +x /usr/local/bin/start

# Run start script
CMD ["/usr/local/bin/start"]

# Expose port 8000
EXPOSE 8000