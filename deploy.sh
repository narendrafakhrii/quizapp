#!/bin/sh

echo "🚀 Starting deployment..."

# Install dependencies
npm install --omit=dev

# Build assets
npm run build

# Laravel optimizations
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan migrate --force
