web: php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
worker: php artisan queue:work --tries=3
release: sh deploy.sh
