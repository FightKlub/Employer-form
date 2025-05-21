# Use official PHP image with Apache
FROM php:8.2-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
# Enable Apache rewrite module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy all files to container
COPY . .

# Allow uploads folder to be writable
RUN chmod -R 777 uploads
