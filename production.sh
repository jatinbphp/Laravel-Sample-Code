#!/bin/sh
set -e
echo "[PRODUCTION] Deploying application..."

# Change to the project directory
cd /var/www/vhosts/thewebcamlab.ro/app.thewebcamlab.ro

# Enter maintenance mode
php artisan down || true

# Update codebase
#git fetch origin dev
git pull origin dev
#git reset --hard origin/dev

# Install dependencies based on lock file
export COMPOSER_ALLOW_SUPERUSER=1;

composer install -q --no-ansi --no-interaction --no-suggest --no-progress --prefer-dist

# Migrate database
php artisan migrate --force

# Clear cache
php artisan optimize

# Exit maintenance mode
php artisan up

echo "Deployment was successfully!"