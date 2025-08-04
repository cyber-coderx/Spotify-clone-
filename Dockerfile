# Use official PHP image with Apache
FROM php:8.2-apache

# Install common PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite for clean URLs
RUN a2enmod rewrite

# Copy all files to the web server root
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Optional: set public/ as document root
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Set permissions (optional)
RUN chown -R www-data:www-data /var/www/html

# Expose default web port
EXPOSE 80
