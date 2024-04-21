FROM php:8.1-fpm-alpine

ARG APP_KEY
ARG APP_URL
ARG DB_CONNECTION
ARG DB_HOST
ARG DB_PORT
ARG DB_DATABASE
ARG DB_USERNAME
ARG DB_PASSWORD
ARG DB_SCHEMA

ARG PUSHER_APP_ID
ARG PUSHER_APP_KEY
ARG PUSHER_APP_SECRET
ARG PUSHER_APP_CLUSTER

ENV APP_NAME=hei-citi
ENV APP_ENV=production
ENV APP_KEY=$APP_KEY
ENV APP_DEBUG=false
ENV APP_URL=$APP_URL
ENV DB_CONNECTION=$DB_CONNECTION
ENV DB_HOST=$DB_HOST
ENV DB_PORT=$DB_PORT
ENV DB_DATABASE=$DB_DATABASE
ENV DB_USERNAME=$DB_USERNAME
ENV DB_PASSWORD=$DB_PASSWORD
ENV DB_SCHEMA=$DB_SCHEMA
ENV LOG_CHANNEL=daily
ENV LOG_DEPRECATIONS_CHANNEL=null
ENV LOG_LEVEL=debug
ENV BROADCAST_DRIVER=log
ENV CACHE_DRIVER=file
ENV FILESYSTEM_DISK=local
ENV QUEUE_CONNECTION=sync
ENV SESSION_DRIVER=file
ENV SESSION_LIFETIME=120

ENV PUSHER_APP_ID=$PUSHER_APP_ID
ENV PUSHER_APP_KEY=$PUSHER_APP_KEY
ENV PUSHER_APP_SECRET=$PUSHER_APP_SECRET
ENV PUSHER_HOST=
ENV PUSHER_PORT=443
ENV PUSHER_SCHEME=https
ENV PUSHER_APP_CLUSTER=$PUSHER_APP_CLUSTER

RUN apk add --no-cache \
        postgresql-dev \
        libzip-dev \
        curl \
        libpng-dev \
        libjpeg-turbo-dev \
        zlib-dev \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql sockets gd zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN chown -R www-data:www-data /app/storage

RUN composer install

CMD php artisan serve --host=0.0.0.0
