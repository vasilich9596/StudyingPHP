FROM php:7.4-cli
RUN apt-get update
RUN apt-get -y install git nano


WORKDIR /code