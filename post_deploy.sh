#!/bin/sh

# optimize for deployment
php artisan key:generate
php artisan route:clear
php artisan route:cache
php artisan config:clear
php artisan config:cache

# update application cache
php artisan optimize

# set correct permission
chown -R www-data:www-data /var/www
chmod -R 755 /var/www

# start the application
php-fpm -D &&  nginx -g "daemon off;"

