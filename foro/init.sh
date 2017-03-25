#!/bin/bash

cp .env.example .env
touch database/database.sqlite
php artisan migrate:install
wget https://phar.phpunit.de/phpunit-5.7.phar
mv phpunit-5.7.phar phpunit.phar
composer require "laravelcollective/html":"^5.4.0"
composer require cviebrock/eloquent-sluggable
composer require laracasts/flash
