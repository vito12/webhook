#!/usr/bin/env sh

echo "dropping all tables"
# PRIMA CANCELLO TUTTE LE TABELLE
php artisan migrate:remove_all_tables

echo "recreating all tables with migrations"
# ORA POSSO INIZIARE A MIGRARE
php artisan migrate

echo "populate all tables with seed data"
php artisan db:seed