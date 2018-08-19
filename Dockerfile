FROM php:7
#RUN apt-get update -y && apt-get install -y openssl zip unzip git
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#RUN docker-php-ext-install pdo mbstring
#WORKDIR /app
#COPY /rosterbots /app
#RUN composer install
#
#CMD php artisan serve --host=0.0.0.0 --port=8181
#EXPOSE 8181



RUN docker-php-ext-install pdo_mysql

ADD /rosterbots /var/www
ADD /rosterbots/public /var/www/html

#ADD config/docker/apache.conf /etc/apache2/httpd.conf
#COPY config/docker/php.ini /usr/local/etc/php/
