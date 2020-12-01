# https://github.com/docker-library/php/tree/135204c0f4c7a255ee70ec82dc1133929f9676c0/7.4-rc
FROM php:7.4-fpm

LABEL maintainer="Axxess PHP Team"

# PHP core extensions
RUN apt-get update \
    && apt-get install -y \
        dos2unix \
        git \
        nginx \
        supervisor \
        unzip \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install pdo_mysql \
    # Clean up
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* var/tmp/*

# Scripts
COPY docker/app/composer-installer.sh /usr/local/bin/composer-installer
RUN dos2unix /usr/local/bin/composer-installer

# Verify and install composer
RUN chmod +x /usr/local/bin/composer-installer \
    && composer-installer \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer \
    && composer --version

# Web server configuration
COPY docker/app/default /etc/nginx/sites-enabled/default

# Deligate to supervisor
COPY docker/app/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

CMD [ "/usr/bin/supervisord" ]
