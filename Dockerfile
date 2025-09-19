# Use the official PHP Apache image
FROM php:8.2-apache

# (Optional) install extra PHP extensions you might need
# RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

# Copy all files into Apache's web root
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html

# Expose port 80
EXPOSE 80
