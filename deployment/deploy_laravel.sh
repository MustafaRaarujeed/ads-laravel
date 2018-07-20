#!/bin/bash

# Enter html directory
cd /var/www/html/

# Create cache and chmod folders
# mkdir -p /var/www/html/bootstrap/cache
# mkdir -p /var/www/html/storage/framework/sessions
# mkdir -p /var/www/html/storage/framework/views
# mkdir -p /var/www/html/storage/framework/cache
# mkdir -p /var/www/html/public/files/

# Install dependencies
export COMPOSER_ALLOW_SUPERUSER=1
composer install -d /var/www/html/

# Copy configuration from /var/www/.env, see README.MD for more information
cp /var/www/html/.env.example /var/www/html/.env

# Generate key envryption
php artisan key:generate

# Clear any previous cached views
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Optimize the application
php artisan config:cache
# php /var/www/html/artisan optimize

# Change rights
chmod 777 -R /var/www/html/bootstrap/cache
chmod 777 -R /var/www/html/storage
chmod 777 -R /var/www/html/public/
# chmod 777 -R /var/www/html/public/files/

# Bring up application
php artisan up