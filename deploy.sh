#!/bin/sh

echo "🚀 Starting deployment..."

# PHP dependencies
composer install --no-dev --optimize-autoloader

# Node dependencies
npm install --omit=dev --force
npm run build

# Laravel optimize
php artisan config:cache
php artisan route:cache
php artisan view:clear
php artisan storage:link || true

echo "✅ Deployment finished!"
