FROM php:7.0-fpm

RUN apt-get update && apt-get install -y \
        libzip-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
        libpq-dev \
        libwebp-dev \
        libmemcached-dev \
        git \
        redis-server \
        redis-tools \
    && pecl install xdebug zip \
    && curl -L -o /tmp/memcached.tar.gz "https://github.com/php-memcached-dev/php-memcached/archive/php7.tar.gz" \
           && mkdir -p memcached \
           && tar -C memcached -zxvf /tmp/memcached.tar.gz --strip 1 \
           && ( \
               cd memcached \
               && phpize \
               && ./configure \
               && make -j$(nproc) \
               && make install \
           ) \
           && rm -r memcached \
           && rm /tmp/memcached.tar.gz \
           && docker-php-ext-enable memcached \
    && docker-php-ext-install -j$(nproc) iconv mcrypt \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-webp-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo \
    && docker-php-ext-install pdo_pgsql \ 
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install exif \
    && docker-php-ext-install json \
    && docker-php-ext-install zip


COPY my-php.ini /usr/local/etc/php/conf.d/
COPY st.conf /usr/local/etc/php-fpm.d/
COPY composer_installer.php /composer_installer.php
RUN php /composer_installer.php --install-dir=/usr/local/bin --filename=composer

# RUN usermod -u 1000 www-data && mkdir /root/.ssh

ENV HOME /var/www/html

# USER www-data
EXPOSE 9000