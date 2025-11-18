# Build stage
FROM php:8.3-fpm-alpine AS build

WORKDIR /var/www/html

# Install dependencies
RUN apk add --no-cache \
    bash \
    git \
    unzip \
    libzip-dev \
    oniguruma-dev \
    postgresql-dev \
    icu-dev \
    curl \
    npm \
    nodejs \
    autoconf \
    gcc \
    g++ \
    make \
    shadow \
    && docker-php-ext-install pdo_pgsql mbstring zip bcmath opcache intl \
    && apk del gcc g++ make autoconf

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy project
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --prefer-dist

# Build frontend if needed
RUN if [ -f package.json ]; then npm install && npm run build; fi

# Production stage
FROM php:8.3-fpm-alpine AS production

WORKDIR /var/www/html

COPY --from=build /var/www/html /var/www/html

# Non-root user
RUN addgroup -g 1000 www && adduser -u 1000 -G www -s /bin/sh -D www

# Permissions
RUN chown -R www:www /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 9000

USER www

CMD ["php-fpm"]
