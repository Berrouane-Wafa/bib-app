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

# 2. Installation des dépendances système nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql pdo_pgsql

# 3. Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Configuration d'Apache pour Laravel
# Modification du répertoire racine vers /public et activation du rewrite
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# 5. Préparation de l'application
WORKDIR /var/www/html
COPY . .

# 6. Installation des dépendances PHP et gestion des permissions
RUN composer install --no-dev --optimize-autoloader
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 7. Configuration du port dynamique (Crucial pour Render)
# Cette étape remplace le port 80 par le port dynamique fourni par Render
RUN sed -i "s/80/\${PORT:-10000}/g" /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# 8. Exposition du port
EXPOSE ${PORT:-10000}

# 9. Lancement du serveur Apache au premier plan
# NE PAS ajouter de commandes comme "migrate" ici, faites-le via le Shell Render
CMD ["apache2-foreground"]