# Dockerfile
FROM php:8.2.18-cli

# Instalar dependências
RUN apt-get update && apt-get install -y \
    libpq-dev libonig-dev libzip-dev libcurl4-openssl-dev \
    && docker-php-ext-install \
    pdo_pgsql mbstring zip curl


# Definir diretório de trabalho
WORKDIR /app

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiar arquivos existentes e instalar dependências do projeto
COPY . .

RUN composer install --no-interaction


EXPOSE 8000

CMD php artisan migrate && php artisan key:generate \
    && php artisan serve --host=0.0.0.0 --port=8000



