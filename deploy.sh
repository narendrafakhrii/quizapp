#!/bin/sh

echo "🚀 Starting deployment..."

# Bersihkan cache & folder lama
npm cache clean --force
rm -rf node_modules/.cache || true
rm -rf bootstrap/cache/*.php

# PHP dependencies
composer install --no-dev --optimize-autoloader

# Node dependencies
npm ci --omit=dev
npm run build

# Laravel optimize
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan storage:link || true

echo "✅ Deployment finished!"
