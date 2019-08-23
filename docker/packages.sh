#!/bin/bash

# add php repository
apt-add-repository -k hkp://ha.pool.sks-keyservers.net:80 -y ppa:ondrej/php

# add node repository
curl -sL https://deb.nodesource.com/setup_11.x | bash -

# install apt-get packages
DEBIAN_FRONTEND=noninteractive \
    apt-get install -qqy --no-install-recommends \
    ca-certificates \
    crudini \
    git \
    libpng-dev \
    mysql-client \
    nano \
    nginx \
    nodejs \
    php7.3-bcmath \
    php7.3-cli \
    php7.3-common \
    php7.3-curl \
    php7.3-fpm \
    php7.3-gd \
    php7.3-gmp \
    php7.3-imagick \
    php7.3-imap \
    php7.3-mbstring \
    php7.3-mysql \
    php7.3-pgsql \
    php7.3-sqlite \
    php7.3-xdebug \
    php7.3-xml \
    php7.3-zip \
    unzip \
    zip

# cleanup after one's self
apt-get clean 
rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# install php's composer
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local
mv /usr/local/composer.phar /usr/local/bin/composer
