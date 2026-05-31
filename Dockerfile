FROM php:8.2-apache

# Installation des extensions nécessaires

# RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
#     && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql

RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev libpq-dev zip unzip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql pdo_pgsql

# Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configuration d'Apache pour Laravel
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# Copie du code
WORKDIR /var/www/html
COPY . .

# Installation des dépendances
RUN composer install --no-dev --optimize-autoloader

# Permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Ajoutez cette ligne dans votre Dockerfile avant le CMD
RUN sed -i 's/80/${PORT}/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# Assurez-vous que cette commande est présente à la fin de votre Dockerfile
CMD ["apache2-foreground"]
