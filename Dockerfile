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

# Image config
ENV WEBROOT /var/www/html/public
ENV APP_ENV production
ENV RUN_SCRIPTS 1

# Install Laravel parts
RUN composer install --no-dev --optimize-autoloader
RUN chown -R www-data:www-data storage bootstrap/cache


# ... (after your existing COPY and RUN commands)

# Set the document root to /public
ENV WEBROOT /var/www/html/public

# This tells the image to use the Laravel-specific Nginx config
ENV NGINX_CONF_INCLUDE laravel

# Crucial: Ensure the server treats index.php as the entry point
RUN sed -i 's/index index.html index.htm;/index index.php index.html index.htm;/g' /etc/nginx/sites-available/default.conf