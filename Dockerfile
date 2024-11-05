FROM php:8.2-fpm

# Установка необходимых расширений
RUN docker-php-ext-install pdo pdo_mysql

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Установка рабочей директории
WORKDIR /var/www/html

# Копируем файлы приложения
COPY . .

# Установка зависимостей Laravel
RUN composer install
