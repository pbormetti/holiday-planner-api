#!/usr/bin/env bash

composer install

/home/pug/.scripts/wait-for-it.sh db:3306
bin/console doctrine:migrations:migrate --no-interaction

php-fpm