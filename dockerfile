FROM php:7.4-apache

RUN apt-get update && apt-get install -y \        
&& docker-php-ext-install mysqli pdo pdo_mysql  

RUN a2enmod rewrite                                          
RUN chmod 777 -R -c /var/www

RUN apt update
RUN apt install -y git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer