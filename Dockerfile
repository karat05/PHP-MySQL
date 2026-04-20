# Используем официальный образ PHP с Apache
FROM php:8.2-apache

# Устанавливаем расширения для работы с БД
RUN docker-php-ext-install pdo pdo_mysql

# Копируем конфиг Apache (опционально, но полезно для настройки)
# COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Копируем файлы из папки src в контейнер
# (Если используете volumes в docker-compose, этот шаг можно пропустить,
# но для первой сборки лучше оставить)
COPY ./src /var/www/html