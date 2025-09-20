#!/bin/sh

echo "🚀 Starting deployment..."

# PHP dependencies
composer install --no-dev --optimize-autoloader

# Node dependencies
npm ci --omit=dev
npm run build

# Laravel optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link || true

echo "✅ Deployment finished!"
