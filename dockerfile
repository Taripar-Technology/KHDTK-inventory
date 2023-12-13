# Stage 1: Build
FROM node:14 as nodebuilder

# Set working directory
WORKDIR /app

# Salin file package.json dan package-lock.json (jika ada)
COPY package*.json ./

# Install Node.js dependencies
RUN npm install

# Salin semua file aplikasi
COPY . .

# Jalankan Laravel Mix untuk production
RUN npm run production

# Stage 2: PHP Build
FROM php:8.0-apache as phpbuilder

# Install ekstensi PHP yang dibutuhkan oleh Laravel
RUN docker-php-ext-install pdo pdo_mysql

# Aktifkan modul rewrite Apache
RUN a2enmod rewrite

# Salin source code aplikasi ke dalam image
COPY . /var/www/html

# Salin hasil build dari nodebuilder
COPY --from=nodebuilder /app/public /var/www/html/public

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Jalankan Composer untuk menginstall dependencies PHP
RUN composer install --no-dev --optimize-autoloader

# Atur hak akses folder
RUN chown -R www-data:www-data /var/www/html

# Stage 3: Production
FROM php:8.0-apache

# Copy dari phpbuilder
COPY --from=phpbuilder /var/www/html /var/www/html

# Atur hak akses folder
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite
