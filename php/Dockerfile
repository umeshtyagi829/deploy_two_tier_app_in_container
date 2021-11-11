#base image
FROM php:7.4-apache

LABEL Author="Umesh Tyagi" 

RUN apt-get update && apt-get upgrade -y

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

COPY code/ /var/www/html/
