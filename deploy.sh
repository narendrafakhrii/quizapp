#!/bin/sh

echo "🚀 Starting deployment..."

# Install dependencies
npm install --omit=dev

# Build assets
npm run build

# Hapus semua user
php artisan tinker --execute="App\Models\User::truncate();"

php artisan queue:table

php artisan migrate --force

# Seed the database
php artisan db:seed --force

# Buat symlink ke storage/public
rm -rf public/storage
php artisan storage:link || true
mkdir -p public/storage
cp -r storage/app/public/* public/storage/ || true

# Clear and cache configurations
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
