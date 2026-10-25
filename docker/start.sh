#!/bin/bash
set -e
PORT="${PORT:-8080}"
echo "Listen ${PORT}" > /etc/apache2/ports.conf
export PORT
cd /var/www/html
rm -f /etc/apache2/mods-enabled/mpm_event.* /etc/apache2/mods-enabled/mpm_worker.*
php artisan config:clear || true
php artisan view:clear || true
# Apply pending migrations and ensure the admin account exists (idempotent).
# Safe to run on every boot: Laravel tracks applied migrations and the
# seeder only inserts/refreshes the configured admin row.
php artisan migrate --force || true
php artisan db:seed --class=DatabaseSeeder --force || true
chown -R www-data:www-data storage bootstrap/cache
exec apache2-foreground
