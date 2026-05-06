# Public Deployment

This app is ready to deploy as a Dockerized Laravel site.

## Recommended Host

Railway is the shortest path for this project because it supports:

- a public URL
- Docker deploys from GitHub
- managed MySQL
- custom domains later

## Before You Deploy

1. Push this project to GitHub.
2. Keep `.env` local only. Do not upload it.
3. Make sure your seeders contain the content you want on the public site.

## Railway Steps

1. Create a new Railway project from your GitHub repository.
2. Add a MySQL service in the same Railway project.
3. Add these environment variables to the web app service:

```env
APP_NAME="Kendra Portfolio"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-app.up.railway.app
APP_KEY=

LOG_CHANNEL=stderr
LOG_LEVEL=error

CACHE_DRIVER=file
FILESYSTEM_DISK=public
QUEUE_CONNECTION=sync
SESSION_DRIVER=file

DB_CONNECTION=mysql
DB_HOST=<railway-mysql-host>
DB_PORT=<railway-mysql-port>
DB_DATABASE=<railway-mysql-database>
DB_USERNAME=<railway-mysql-username>
DB_PASSWORD=<railway-mysql-password>
```

4. Generate an app key locally with:

```bash
php artisan key:generate --show
```

5. Paste that value into `APP_KEY` in Railway.
6. Deploy the app.
7. After the first deploy, run these commands in the Railway app shell:

```bash
php artisan migrate --force
php artisan db:seed --force
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## What This Dockerfile Does

- installs PHP dependencies with Composer
- builds Vite assets
- serves Laravel from `public/` through Apache
- keeps `storage/` and `bootstrap/cache/` writable

## Public Access Check

Your routes are already public. The custom middleware only blocks requests if someone manually visits the site with `?blocked=1`.

## After Deployment

1. Open the Railway URL and verify the home page loads.
2. Check `/projects`, `/skills`, `/educations`, and `/contacts`.
3. Add a custom domain from Railway when the app is working.

## Important Note

This app currently uses file-based sessions and cache. That is fine for a single small portfolio instance. If you later scale to multiple instances, move sessions and cache to Redis or database-backed storage.