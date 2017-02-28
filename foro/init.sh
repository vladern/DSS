#!/bin/bash

cp .env.example .env
touch database/database.sqlite
php artisan migrate:install
wget https://phar.phpunit.de/phpunit-5.7.phar
mv phpunit-5.7.phar phpunit.phar
