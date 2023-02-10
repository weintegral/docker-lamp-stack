FROM php:8.2.2-apache

LABEL Maintainer="Gopibabu Srungavarapu <s.gopibabu@gmail.com>" \
      Description="Base setup for web development with LAMP stack"

# environment variables and arguments
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_PROCESS_TIMEOUT 2000
RUN pear config-set php_ini $PHP_INI_DIR/php.ini

# installing essential packages
RUN apt-get -yqq update \
    && apt-get -yqq install --no-install-recommends zip unzip \
        build-essential \
        libzip-dev \
        libicu-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
        libonig-dev \
        locales \
        libpq-dev \
        curl \
        wget \
        vim \
        git\
        libssl-dev \
        libcurl4-openssl-dev \
        openssh-client\
    && docker-php-ext-configure intl \
    && docker-php-ext-configure zip \
    && docker-php-ext-install mysqli pdo pdo_mysql pcntl intl zip \
    && a2enmod rewrite

RUN pecl install xdebug redis \
    && docker-php-ext-enable xdebug redis \
    && a2enmod rewrite

# clean apt un used cache
RUN apt-get clean -yqq && rm -rf /var/lib/apt/lists/*

# apache config
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# php config
COPY docker/config/php/php.ini /usr/local/etc/php/php.ini
COPY docker/config/php/conf.d/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
COPY docker/config/php/conf.d/error_reporting.ini /usr/local/etc/php/conf.d/error_reporting.ini

# helper files
COPY docker/start.sh /usr/local/bin/start
COPY docker/helpers/.bashrc /root/.bashrc
RUN chmod +x /usr/local/bin/start

# installing composer
RUN php -r 'var_dump(openssl_get_cert_locations());'
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

# install node and npm
RUN apt-get -yqq install ca-certificates
RUN wget -O /etc/ssl/ca-bundle.crt https://curl.se/ca/cacert.pem --no-check-certificate
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get update -yqq && apt-get install -yqq nodejs

WORKDIR /var/www/html
COPY . /var/www/html
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["/usr/local/bin/start"]
