#!/bin/sh

composer install --optimize-autoloader

if ! psql -h db -U ${DB_USER} -lqt | cut -d \| -f 1 | grep -qw ${DB_NAME}; then
    createdb -h db -U ${DB_USER} ${DB_NAME}
    echo "Database ${DB_NAME} created."
else
    echo "Database ${DB_NAME} already exists."
fi

php artisan migrate
php artisan storage:link

php artisan serve --host=0.0.0.0 --port=8000
