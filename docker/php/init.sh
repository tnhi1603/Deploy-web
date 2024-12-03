#!/bin/bash

# Check if the database has already been seeded
if [ ! -f "/var/www/html/database/seeded" ]; then
    # Run database migrations
    php artisan migrate

    # Run database seeders
    php artisan db:seed

    # Create a file to indicate that the database has been seeded
    touch "/var/www/html/database/seeded"
fi

# Start the application
php artisan serve --host=0.0.0.0 --port=8000