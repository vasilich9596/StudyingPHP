FROM php:7.4-cli
RUN apt-get update
RUN apt-get -y install git nano
RUN apt-get -y install telnet

RUN docker-php-ext-install pdo_mysql

WORKDIR /code