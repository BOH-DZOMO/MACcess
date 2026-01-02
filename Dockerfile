# 1. Use a special 'all-in-one' tool that has PHP and a Web Server
FROM richarvey/nginx-php-fpm:latest

# 2. Put your code into the container
COPY . .

# 3. Tell the container where the "front door" of your app is
ENV WEBROOT /var/www/html/public

# 4. Install the Laravel parts
RUN composer install --no-dev --optimize-autoloader

# 5. Make sure the 'closets' (folders) are unlocked so Laravel can write files
RUN chown -R www-data:www-data storage bootstrap/cache