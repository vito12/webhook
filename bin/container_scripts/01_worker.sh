#!/usr/bin/env sh

php artisan queue:work --sleep=3 --tries=3 --daemon