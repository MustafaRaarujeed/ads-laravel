#!/usr/bin/env bash

composer install

cp .env.example .env

php artisan key:generate

