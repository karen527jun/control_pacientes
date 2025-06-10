# Usa una imagen base de PHP-FPM con las extensiones comunes para Laravel
FROM php:8.2-fpm-alpine

# Instala dependencias del sistema necesarias para PHP, Node.js y Composer
RUN apk add --no-cache \
    build-base \
    autoconf \
    libzip-dev \
    libpng-dev \
    jpeg-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    oniguruma-dev \
    postgresql-dev \
    mysql-client \
    git \
    nodejs \
    npm

# Instala extensiones de PHP necesarias para Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd opcache

# Limpiar caché de paquetes (opcional, buena práctica)
RUN rm -rf /var/cache/apk/*

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configura el directorio de trabajo dentro del contenedor
WORKDIR /var/www/html

# Copia el código de tu aplicación al contenedor
COPY . /var/www/html

# Instala las dependencias de Composer (Laravel)
# La opción --no-scripts es útil para evitar que Composer ejecute scripts en la construcción,
# que podrían fallar si la base de datos no está disponible.
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Instala las dependencias de frontend (Node.js/npm)
# Esto se ejecuta durante la construcción de la imagen. Si tienes muchas dependencias
# y cambian a menudo, podrías omitir esto aquí y ejecutar 'docker-compose exec app npm install'
# manualmente la primera vez o cada vez que cambie tu package.json
RUN npm install

# Configura los permisos de storage y bootstrap/cache (importante para Laravel)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/
RUN chmod -R 775 /var/www/html
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Comando principal para el contenedor: No necesitamos ejecutar nada aquí
# porque 'php artisan serve' y 'npm run dev' se ejecutarán manualmente.
# Puedes usar un CMD vacío o un simple sleep si no quieres que el contenedor se detenga.
CMD ["tail", "-f", "/dev/null"]