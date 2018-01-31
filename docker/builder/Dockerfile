FROM php:7.0

RUN apt-get update

# essenziali
RUN apt-get install -y wget curl build-essential git unzip 
RUN apt-get install -y libzip-dev

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
        libpq-dev \
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
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-install exif \
    && docker-php-ext-install json 

# RUN docker-php-ext-install zip

# install composer PHP packaging utility
RUN wget -O /usr/local/bin/composer -q http://getcomposer.org/composer.phar \
	&& chmod +x /usr/local/bin/composer

# alla partenza vai nella cartella wa
WORKDIR /wa/








