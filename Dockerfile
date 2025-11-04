# Imagen base con Apache y PHP
FROM php:8.2-apache

# Instalar dependencias del sistema y extensiones PHP necesarias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    sqlite3 \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath gd

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar todo el proyecto
COPY . .

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader || true

# Crear archivo .env si no existe (para evitar error de artisan)
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Dar permisos a storage y bootstrap/cache
RUN chmod -R 777 storage bootstrap/cache

# Ejecutar artisan key:generate solo si .env existe
RUN php -r "if (file_exists('.env')) { system('php artisan key:generate'); }"

# Exponer puerto
EXPOSE 80

# Iniciar servidor Apache
CMD ["apache2-foreground"]
