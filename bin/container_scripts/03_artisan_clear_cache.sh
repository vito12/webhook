#!/usr/bin/env sh

composer dump-autoload
php artisan view:clear
php artisan cache:clear