#!/bin/bash

chmod -R 777 /var/www
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
composer install --working-dir="/var/www" --optimize-autoloader --no-dev 
composer dump-autoload --working-dir="/var/www"

if [ "$APP_DEBUG" != "true" ]; then
echo "Optimizing App for Deployment Environment"
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
chmod 000 /var/www/public/phpinfo.php
else
chown -R www-data:www-data /var/www
chmod -R 755 /var/www
fi

# start the application
php-fpm -D &&  nginx -g "daemon off;"

