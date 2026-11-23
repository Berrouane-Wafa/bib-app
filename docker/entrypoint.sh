#!/bin/bash
set -e

cd /var/www/html

# Create Laravel writable directories
mkdir -p storage/logs \
         storage/framework/cache/data \
         storage/framework/sessions \
         storage/framework/views \
         bootstrap/cache

# Set permissions before running Artisan
chown -R www-data:www-data storage bootstrap/cache
chmod -R ug+rwX storage bootstrap/cache

# Database migrations
php artisan migrate --force

# Seed initial data
php artisan db:seed --force

# Optimize Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Correct ownership again because Artisan may create files as root
chown -R www-data:www-data storage bootstrap/cache
chmod -R ug+rwX storage bootstrap/cache

# Start Apache
exec apache2-foreground
