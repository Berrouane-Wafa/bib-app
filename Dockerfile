# FROM php:8.2-apache

# # Installation des extensions nécessaires

# # RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
# #     && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql

# RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev libpq-dev zip unzip git \
#     && docker-php-ext-configure gd --with-freetype --with-jpeg \
#     && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql pdo_pgsql

# # Installation de Composer
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# # Configuration d'Apache pour Laravel
# RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
# RUN a2enmod rewrite

# # Copie du code
# WORKDIR /var/www/html
# COPY . .

# # Installation des dépendances
# RUN composer install --no-dev --optimize-autoloader

# # Permissions
# RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# # ... (votre code jusqu'à la ligne "Permissions" est bon)

# # Exposer le port que Render utilisera
# EXPOSE ${PORT}

# # Script de démarrage robuste :
# # 1. On modifie les fichiers de config Apache
# # 2. On lance les migrations/seeders
# # 3. On lance Apache au premier plan
# CMD sed -i "s/80/${PORT}/g" /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf && \
#     php artisan migrate --force && \
#     php artisan db:seed --force && \
#     apache2-foreground
# 1. Utilisation d'une image PHP 8.2 avec Apache
FROM php:8.2-apache

# 1. Installation des dépendances
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev libpq-dev zip unzip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 2. Configuration d'Apache
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# 3. Préparation du code
WORKDIR /var/www/html
COPY . .
RUN composer install --no-dev --optimize-autoloader
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 4. Configuration cruciale du port pour Render
RUN sed -i "s/80/\${PORT:-10000}/g" /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf
EXPOSE ${PORT:-10000}

# 5. COMMANDE DE DÉMARRAGE UNIQUE
# NE PAS ajouter de commandes de migration ici
CMD ["apache2-foreground"]