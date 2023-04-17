FROM node:19-alpine3.16 AS build-js

WORKDIR /usr/src/app
COPY ./vue-project .

RUN npm install
RUN npm run build
#RUN ls -la /usr/src/app/dist



FROM composer:2.5.5 AS build-php

WORKDIR /usr/src/app
COPY ./src .

RUN /usr/bin/composer install --ignore-platform-reqs --no-scripts


FROM php:8.2-zts-alpine3.16

RUN docker-php-ext-install bcmath
WORKDIR /var/www/html

COPY --from=build-php /usr/src/app .
COPY --from=build-js /usr/src/app/dist .
