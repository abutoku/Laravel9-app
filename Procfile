release: php artisan migrate --force
web: vendor/bin/heroku-php-apache2 public/
worker: php artisan queue:restatr && php artisan queue:work database --tries=3 --delay=60
