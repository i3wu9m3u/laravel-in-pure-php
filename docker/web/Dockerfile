FROM php:7.4-apache

ARG TZ

RUN set -eux \
  && ln -sf /usr/share/zoneinfo/${TZ} /etc/localtime \
  && apt-get update \
  && apt-get install -y \
    zip \
    unzip \
    vim \
    libpq-dev \
  && docker-php-ext-install \
    pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# for SSL
RUN openssl genrsa -out /etc/apache2/server.key 2048 2>/dev/null \
  && openssl req -new -key /etc/apache2/server.key -out /etc/apache2/server.csr -subj "/C=JP/" \
  && openssl x509 -in /etc/apache2/server.csr -days 365000 -req -signkey /etc/apache2/server.key > /etc/apache2/server.crt 2>/dev/null \
  && rm /etc/apache2/server.csr
COPY ./apache2/sites-available /etc/apache2/sites-available
RUN a2enmod ssl && a2ensite default-ssl
