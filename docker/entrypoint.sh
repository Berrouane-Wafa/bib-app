#!/bin/bash
# Exécuter les migrations de la base de données
php artisan migrate --force
# Optimiser les performances
php artisan config:cache
php artisan route:cache
php artisan view:cache
# Lancer le serveur Apache
apache2-foreground