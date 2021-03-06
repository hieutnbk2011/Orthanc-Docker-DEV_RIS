FROM php:7.4-fpm
# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    dcmtk \
    wkhtmltopdf

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN mkdir /dicomFiles
COPY dicomFiles/*.* /dicomFiles/
COPY php.ini /usr/local/etc/php/php.ini
# adjustments to php.ini base on the production version.

# Install extensions and configure

RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-configure zip
RUN docker-php-ext-install pdo_mysql zip exif pcntl gd


# RUN sed -E -i -e 's/max_execution_time = 1200/max_execution_time = 120/' /etc/php.ini \
#  && sed -E -i -e 's/memory_limit = 128M/memory_limit = 512M/' /etc/php.ini \
#  && sed -E -i -e 's/post_max_size = 8M/post_max_size = 64M/' /etc/php.ini \
#  && sed -E -i -e 's/upload_max_filesize = 2M/upload_max_filesize = 64M/' /etc/php.ini

# php artisan storage:link 
# THAT NEEDS TO BE RUN FROM THE nginx-home/LaravelPortal/ directory to symlink the storage directory.  NEED to figure out how to do that.
# sudo docker exec -it  orthanc-docker-dev_ris_php-fpm_1 /bin/bash

ENTRYPOINT ["php-fpm"]

