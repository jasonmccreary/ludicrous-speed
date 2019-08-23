#!/bin/bash

# PHP FPM Service
mkdir -p /etc/service/php-fpm
cp /usr/local/bin/runit-phpfpm /etc/service/php-fpm/run

# Nginx Service
mkdir -p /etc/service/nginx
cp /usr/local/bin/runit-nginx /etc/service/nginx/run

exec /sbin/my_init