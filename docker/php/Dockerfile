FROM php:8.2-fpm-alpine

# Update & timezone
RUN apk update && apk add --no-cache tzdata
ENV TZ="Asia/Ho_Chi_Minh"

# Build dependencies
RUN apk add --no-cache \
    autoconf \
    g++ \
    make \
    openssl-dev \
    linux-headers \
    libpng-dev \
    libzip-dev

# PHP extensions
RUN docker-php-ext-install \
    gd \
    zip \
    bcmath \
    sockets \
    mysqli \
    pdo \
    pdo_mysql

# Enable extensions (pdo_mysql thường tự enable, nhưng để chắc)
RUN docker-php-ext-enable pdo_mysql mysqli

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php \
    -- --install-dir=/usr/local/bin --filename=composer

# PHP config
COPY php.ini /usr/local/etc/php/conf.d/
