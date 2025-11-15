# Usar una imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instalar mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copiar los archivos de la API al servidor
COPY api/ /var/www/html/

# Habilitar mod_rewrite
RUN a2enmod rewrite
