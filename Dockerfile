FROM php:7.4-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    apt-utils \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    zlib1g-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
# RUN groupadd -g $uid $user
# RUN useradd -u $uid -ms /bin/bash -g $user $user

# Copy existing application directory contents
COPY . /var/www
COPY .env.pro /var/www/.env
RUN cat /var/www/.env

# Copy existing application directory permissions
# COPY --chown=$user:$user . /var/www

# Composer 
RUN composer install
RUN php artisan optimize

# Change current user to www
# USER $user

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]