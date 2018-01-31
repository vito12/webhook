#!/usr/bin/env sh

composer install --no-interaction --no-dev --prefer-dist
chmod -R 777 storage/
php artisan storage:link