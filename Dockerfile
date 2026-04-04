# --- STAGE 1: Build the Assets (Node.js) ---
FROM node:18 AS build-stage
WORKDIR /app
COPY . .
RUN npm install
RUN npm run build

# --- STAGE 2: Run the Website (PHP/Nginx) ---
FROM richarvey/nginx-php-fpm:latest
WORKDIR /var/www/html

# Copy all your code
COPY . .

# Copy ONLY the built assets from Stage 1 into the public folder
COPY --from=build-stage /app/public/build ./public/build
# Change from something like php:8.2-fpm to:
FROM php:8.4-fpm

# Image config
ENV WEBROOT /var/www/html/public
ENV APP_ENV production
ENV RUN_SCRIPTS 1

# Install Laravel parts
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs
RUN chown -R www-data:www-data storage bootstrap/cache

# Copy our custom nginx config
COPY conf/nginx/nginx-site.conf /etc/nginx/sites-available/default.conf